<?php
	
	include_once 'PersonException.php';
	include_once 'PersonInterface.php';
	include_once 'src/Helpers/Helper.php';
	include_once 'src/Config/Database.php';
	
	class PersonModel implements PersonInterface
	{
		protected $db;
		protected $pdo;
		protected $vars;
		protected $persons;
		protected $lastFivePersons;
		
		public function __construct() {
			$this->getConnection();
		}
		
		private function getConnection() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
		//All persons
		private function setPersons()
		{
			$sql =
				"SELECT *
        FROM person
        ORDER BY firstname DESC
        ";
			
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$persons = $stmt->fetchAll();
			$stmt->closeCursor();
			
			$this->persons = $persons;
		}
		
		public function getPersons() {
			$this->setPersons();
			return $this->persons;
		}
		
		//Last five persons
		private function setLastFivePersons()
		{
			$sql =
				"SELECT person.*, company.name
        FROM person,company
        WHERE person.company_id = company.id
        ORDER BY person.id DESC
        LIMIT 5";
			
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$lastFivePersons = $stmt->fetchAll();
			$stmt->closeCursor();
			$this->lastFivePersons = $lastFivePersons;
		}
		
		public function getLastFivePersons()
		{
			$this->setLastFivePersons();
			return $this->lastFivePersons;
		}
		
		public function getPersonById($person_id): array
		{
			$sql =
				"SELECT person.*
         FROM person
         WHERE person.id = $person_id
         ";
			
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$contact = $stmt->fetchAll();
			$stmt->closeCursor();
			return $contact;
		}
		
		/**
		 * @throws PersonException
		 */
		public function create(array $form_vars = array())
		{
			$this->checkDataSentByForm($form_vars,true);
			//attempts to create the person
			if (!$this->addNewPerson($this->vars)) {
				throw new PersonException("Could not create person in database, please try again later.");
			}
			
			// all check are ok and person created successfully
		}
		
		protected function emailAlreadyInUse($email): bool
		{
			$query = $this->pdo->prepare("SELECT * FROM person WHERE email = ?");
			$query->execute(array($email));
			$emailExist = $query->rowCount();
			return $emailExist != 0;
		}
		
		protected function addNewPerson($data): bool
		{
			$stmt = $this->pdo->prepare("INSERT INTO person (firstname, lastname, email, company_id) VALUES(?, ?, ?, ?)");
			$result = $stmt->execute(array($data['firstname'],$data['lastname'],$data['email'],$data['company_id']));
			if (!$result) return false;
			return true;
		}
		
		/**
		 * @throws PersonException
		 */
		public function update(array $form_vars = array()) {
			$this->checkDataSentByForm($form_vars,false);
			//attempts to create the person
			if (!$this->updatePerson($this->vars)) {
				throw new PersonException("Could not create person in database, please try again later.");
			}
			
			// person updated successfully
		}
		protected function updatePerson($data): bool
		{
			$sql = "UPDATE person SET firstname=?, lastname=?, email=?, company_id=? WHERE id=?";
			$stmt = $this->pdo->prepare($sql);
			$status = $stmt->execute(array($data['firstname'],$data['lastname'],$data['email'],$data['company_id'],(int)$data['person_id']));
			if (!$status) return false;
			return true;
		}
		
		
		/**
		 * @throws PersonException
		 */
		public function delete($person_id) {
			//attempts to delete the company
			if (!$this->deletePerson($person_id)) {
				throw new PersonException("Could not remove contact from database, please try again later.");
			}
		}
		protected function deletePerson($person_id): bool
		{
			$sql = "DELETE FROM person WHERE id=?";
			$stmt = $this->pdo->prepare($sql);
			$status = $stmt->execute(array($person_id));
			if (!$status) return false;
			return true;
		}
		
		
		/**
		 * @throws PersonException
		 */
		protected function checkDataSentByForm($form_vars, $new) :void {
			$this->vars['firstname'] = html($form_vars['firstname']);
			$this->vars['lastname'] = html($form_vars['lastname']);
			$this->vars['email'] 		= html($form_vars['email']);
			$this->vars['company_id'] = $form_vars['company_id'];
			if (!$new)  $this->vars['person_id'] = $form_vars['person_id'];
			
			//check if all field are not empty
			if (!filled_out($this->vars)) {
				throw new PersonException('You have not filled the form correctly, please go back and try again.');
			}
			
			//check firstname if alpha
			if (!alpha($this->vars['firstname'])) {
				throw new PersonException('Your firstname must be alpha, please go back and try again.');
			}
			
			//check lastname if alpha
			if (!alpha($this->vars['lastname'])) {
				throw new PersonException('Your lastname must be alpha, please go back and try again.');
			}
			
			//check email address
			if (!valid_email($this->vars['email'])) {
				throw new PersonException('That is not a valid email address, please go back and try again.');
			}
			
			//check if email is already in user
			if ($new) {
				if ($this->emailAlreadyInUse($this->vars['email'])) {
					throw new PersonException('Email is already in use');
				}
			}
		}
		
		
	}