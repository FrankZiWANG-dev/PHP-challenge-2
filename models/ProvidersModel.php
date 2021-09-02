<?php

include_once "src/Config/Database.php";
	
	class ProvidersModel
	{
		protected $db;
		protected $pdo;
        protected $providers;
		
		public function __construct() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
        private function selectProviders(){
            $sql = "SELECT * FROM company WHERE type_id = 2 ORDER BY name ASC" ;

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$providers = $stmt->fetchAll();
			
			$stmt->closeCursor();

            $this->providers = $providers;
        }

		public function getProviders()
		{
            $this->selectProviders();
            return $this->providers;		
			
		}
		
		
	}
