<?php

include_once "src/Config/Database.php";
	
	class ClientsModel
	{
		protected $db;
		protected $pdo;
        protected $clients;
		
		public function __construct() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
        private function selectClients(){
            $sql = "SELECT * FROM company WHERE type_id = 1 ORDER BY name ASC" ;

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$clients = $stmt->fetchAll();
			
			$stmt->closeCursor();

            $this->clients = $clients;
        }

		public function getClients()
		{
            $this->selectClients();
            return $this->clients;		
			
		}
		
		
	}
