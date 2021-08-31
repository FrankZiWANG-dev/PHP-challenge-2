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
            $sql = "SELECT * FROM person ORDER BY lastname ASC" ;

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
