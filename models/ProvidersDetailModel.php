<?php

include_once "src/Config/Database.php";

	class ProvidersDetailModel
	{
		protected $db;
		protected $pdo;
        protected $providersDetail;
		
		public function __construct() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
        private function selectProviders($id){
            $sql = "SELECT * FROM company WHERE id = ?";

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute([$id]);
			$providersDetail = $stmt->fetch();
			
			$stmt->closeCursor();

            $this->providersDetail = $providersDetail;
        }
        
		public function getProvidersDetail($id){
            $this->selectProviders($id);
            return $this->providersDetail;	
		}

        private function selectProvidersInvoices($id){
            $sql2 = "SELECT * FROM invoice WHERE company_id = ? ";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->execute([$id]);
            $providersInvoicesView = $stmt2->fetchAll();
            $stmt2->closeCursor();
            
            $this->providersInvoicesView = $providersInvoicesView;
        }

		public function getProvidersInvoices($id){
            $this->selectProvidersInvoices($id);
            return $this->providersInvoicesView;	
		}
		
        private function selectProvidersContacts($id){
            $sql3 = "SELECT * FROM person WHERE company_id = ?";
            $stmt3 = $this->pdo->prepare($sql3);
            $stmt3->execute([$id]);
            $providersContactsView = $stmt3->fetchAll();
            $stmt3->closeCursor();
            
            $this->providersContactsView = $providersContactsView;
        }

		public function getProvidersContacts($id){
            $this->selectProvidersContacts($id);
            return $this->providersContactsView;	
		}
        
		
	}
