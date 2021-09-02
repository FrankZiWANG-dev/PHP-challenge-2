<?php

include_once "src/Config/Database.php";
	
	class PeopleModel
	{
		protected $db;
		protected $pdo;
        protected $peopleView;
		
		public function __construct() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
        private function selectPeople(){
            $sql = "SELECT person.id, person.firstname, person.lastname, person.email, company.name FROM person INNER JOIN company ON person.company_id = company.id ORDER BY person.lastname ASC";			;

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$peopleView = $stmt->fetchAll();
			
			$stmt->closeCursor();

            $this->peopleView = $peopleView;
        }

		public function getPeople()
		{
            $this->selectPeople();
            return $this->peopleView;		
			
		}		
		
	}
