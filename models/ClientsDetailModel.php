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
		
        private function selectClients($id){
            $sql = "SELECT * FROM person WHERE company_id = ? ORDER BY lastname ASC";

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute([$id]);
			$clientsDetail = $stmt->fetchAll();
			
			$stmt->closeCursor();

            $this->clientsDetail = $clientsDetail;

        }
        
		public function getClientsDetail($id){
            $this->selectClients($id);
            return $this->clientsDetail;
		}
        
        private function selectClientsInvoices($id){
			$sql2 = "SELECT * FROM invoice WHERE company_id = ? ORDER BY date ASC";

			$stmt2 = $this->pdo->prepare($sql2);
			
			$stmt2->execute([$id]);
			$clientsInvoicesView = $stmt2->fetchAll();
	
			$stmt2->closeCursor();

			$this->clientsInvoicesView = $clientsInvoicesView;
        }
        
		public function getClientsInvoices($id){
            $this->selectClientsInvoices($id);
            return $this->clientsInvoicesView;	
		}
		
	}
