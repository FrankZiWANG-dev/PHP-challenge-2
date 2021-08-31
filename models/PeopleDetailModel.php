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
		
        private function selectPeopleDetail(){
            $sql = "SELECT * FROM person WHERE id =3";

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$peopleDetailView = $stmt->fetch();
			
			$stmt->closeCursor();

            $this->peopleDetailView = $peopleDetailView;
        }
        
		public function getPeopleDetail(){
            $this->selectPeopleDetail();
            return $this->peopleDetailView;	
		}

		private function selectPeopleInvoices(){
            $sql2 = "SELECT * FROM invoice WHERE person_id = 3 ORDER BY date ASC";

            $stmt2 = $this->pdo->prepare($sql2);
			
			$stmt2->execute();
			$peopleInvoicesView = $stmt2->fetchAll();
			
			$stmt2->closeCursor();

            $this->peopleInvoicesView = $peopleInvoicesView;
        }
        
		public function getPeopleInvoices(){
            $this->selectPeopleInvoices();
            return $this->peopleInvoicesView;	
		}
		
	}
