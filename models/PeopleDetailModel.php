<?php

include_once "src/Config/Database.php";
	
	class PeopleDetailModel
	{
		protected $db;
		protected $pdo;
        protected $peopleDetailView;
		
		public function __construct() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
        private function selectPeopleDetail($id){
            $sql = "SELECT person.id, person.firstname, person.lastname, person.email, company.name FROM person INNER JOIN company ON person.company_id = company.id WHERE person.id = ?";

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute([$id]);
			$peopleDetailView = $stmt->fetch();
			
			$stmt->closeCursor();

            $this->peopleDetailView = $peopleDetailView;
        }
        
		public function getPeopleDetail($id){
            $this->selectPeopleDetail($id);
            return $this->peopleDetailView;	
		}

		private function selectPeopleInvoices($id){
            $sql2 = "SELECT * FROM invoice WHERE person_id = ? ORDER BY date ASC";

            $stmt2 = $this->pdo->prepare($sql2);
			
			$stmt2->execute([$id]);
			$peopleInvoicesView = $stmt2->fetchAll();
			
			$stmt2->closeCursor();

            $this->peopleInvoicesView = $peopleInvoicesView;
        }
        
		public function getPeopleInvoices($id){
            $this->selectPeopleInvoices($id);
            return $this->peopleInvoicesView;	
		}
	}