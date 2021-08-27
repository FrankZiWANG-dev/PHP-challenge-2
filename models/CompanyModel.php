<?php

include_once "src/Config/Database.php";
	
	class CompanyModel
	{
		protected $db;
		protected $pdo;
        protected $companies;
		
		public function __construct() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
        private function selectCompanies(){
            $sql = "SELECT * FROM company ORDER BY name ASC" ;

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$companies = $stmt->fetchAll();
			
			$stmt->closeCursor();

            $this->companies = $companies;
        }

		public function getCompanies()
		{
            $this->selectCompanies();
            return $this->companies;		
			
		}
		
		
	}
