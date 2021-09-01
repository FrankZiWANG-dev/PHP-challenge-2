<?php
	
	include_once "src/Config/Database.php";
	include_once "CompanyException.php";
	include_once "CompanyInterface.php";
	include_once 'src/Helpers/Helper.php';
	
	class CompanyModel implements CompanyInterface
	{
		protected $db;
		protected $pdo;
		protected $vars;
		protected $companies;
		protected $lastFiveCompanies;
		//protected $company;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
		/**
		 * @throws CompanyException
		 */
		public function create(array $form_vars = array()) {
			$this->checkDataSentByForm($form_vars,true);
			// all check are ok
			//attempts to create the company
			if (!$this->addNewCompany($this->vars)) {
				throw new CompanyException("Could not create company in database, please try again later.");
			}
		}
		
		
		//All companies
		private function setCompanies() {
			$sql =
				"SELECT id,name
        FROM company
        ORDER BY name DESC
        ";
			
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$companies = $stmt->fetchAll();
			$stmt->closeCursor();
			
			$this->companies = $companies;
		}
		
		public function getCompanies() {
			$this->setCompanies();
			return $this->companies;
		}
		
		//Last five companies
		private function setLastFiveCompanies() {
			$sql =
				"SELECT company.*, type.*, company.id AS companyId
        FROM company,type
        WHERE company.type_id = type.id ORDER BY company.id DESC
        LIMIT 5";
			
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$lastFiveCompanies = $stmt->fetchAll();
			$stmt->closeCursor();
			$this->lastFiveCompanies = $lastFiveCompanies;
		}
		
		public function getLastFiveCompanies() {
			$this->setLastFiveCompanies();
			return $this->lastFiveCompanies;
		}
		
		public function getCompanyById($company_id): array
		{
			$sql =
				"SELECT company.*
         FROM company
         WHERE company.id = $company_id
         ";
			
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$company = $stmt->fetchAll();
			$stmt->closeCursor();
			//$this->company = $company;
			return $company;
		}
		
		/**
		 * @throws CompanyException
		 */
		public function update(array $form_vars = array()) {
			//var_dump($form_vars);
			$this->checkDataSentByForm($form_vars,false);
			// all check are ok
			//attempts to update the company
			if (!$this->updateCompany($this->vars)) {
				throw new CompanyException("Could not update company in database, please try again later.");
			}
		}
		
		/**
		 * @throws CompanyException
		 */
		public function delete($company_id) {
			//attempts to delete the company
			if (!$this->deleteCompany($company_id)) {
				throw new CompanyException("Could not create company in database, please try again later.");
			}
		}
		
		protected function vatNumberAlreadyExist($number): bool
		{
			$query = $this->pdo->prepare("SELECT * FROM company WHERE vat = ?");
			$query->execute(array($number));
			$vatExist = $query->rowCount();
			return $vatExist != 0;
		}
		
		protected function addNewCompany($data): bool
		{
			$stmt = $this->pdo->prepare("INSERT INTO company (name, country, vat, type_id) VALUES(?, ?, ?, ?)");
			$result = $stmt->execute(array($data['name'],$data['country'],$data['vat'],$data['type_id']));
			if (!$result) return false;
			return true;
		}
		
		protected function updateCompany($data): bool
		{
			//var_dump($data);
			$sql = "UPDATE company SET name=?, country=?, vat=?, type_id=? WHERE id=?";
			$stmt = $this->pdo->prepare($sql);
			//$stmt->bind_param($data['name'],$data['country'],$data['vat'],$data['type_id'],$data['id']);
			$status = $stmt->execute(array($data['name'],$data['country'],$data['vat'],$data['type_id'],(int)$data['company_id']));
			//if (!$result) return false;
			//$status = $stmt->execute();
			if (!$status) return false;
			return true;
		}
		
		protected function deleteCompany($company_id): bool
		{
			$sql = "DELETE FROM company WHERE id=?";
			$stmt = $this->pdo->prepare($sql);
			$status = $stmt->execute(array($company_id));
			if (!$status) return false;
			return true;
		}
		
		/**
		 * @param array $form_vars
		 * @throws CompanyException
		 */
		protected function checkDataSentByForm(array $form_vars, $new): void
		{
			$this->vars['name'] = $form_vars['name'];
			$this->vars['country'] = $form_vars['country'];
			$this->vars['vat'] = $form_vars['vat'];
			$this->vars['type_id'] = $form_vars['type_id'];
			if (!$new)  $this->vars['company_id'] = $form_vars['company_id'];
			
			//check if all field are not empty
			if (!filled_out($this->vars)) {
				throw new CompanyException('You have not filled the form correctly, please go back and try again.');
			}
			
			//check name if alpha
			if (!alpha($this->vars['name'])) {
				throw new CompanyException('Company name must be alpha, please go back and try again.');
			}
			
			//check vat if respect pattern ^[0-9]{9}
			if (!vatPattern($this->vars['vat'])) {
				throw new CompanyException('Vat number must contain 9 digits, please try again.');
			}
			
			//check if vat number is already take only if creation
			if ($new) {
				if ($this->vatNumberAlreadyExist($this->vars['vat'])) {
					throw new CompanyException('Vat number is already in use');
				}
			}
			
		}
		
		
	}