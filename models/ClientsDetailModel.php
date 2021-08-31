<?php

include_once "src/Config/Database.php";
	
	class ClientsDetailModel
	{
		protected $db;
		protected $pdo;
        protected $clientsDetail;
		
		public function __construct() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
        private function selectClients(){
            $sql = "SELECT * FROM person WHERE company_id =1 ORDER BY lastname";

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$clientsDetail = $stmt->fetchAll();
			
			$stmt->closeCursor();

            $this->clientsDetail = $clientsDetail;
        }
        
		public function getClientsDetail(){
            $this->selectClients();
            return $this->clientsDetail;	
		}
        
        private function selectClientsInvoices(){
            $sql2 = "SELECT * FROM invoice WHERE person_id = 3 ORDER BY date ASC";

            $stmt2 = $this->pdo->prepare($sql2);
			
			$stmt2->execute();
			$clientsInvoicesView = $stmt2->fetchAll();
			
			$stmt2->closeCursor();

            $this->clientsInvoicesView = $clientsInvoicesView;
        }
        
		public function getClientsInvoices(){
            $this->selectClientsInvoices();
            return $this->clientsInvoicesView;	
		}
		
	}
