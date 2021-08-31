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
		
        private function selectProviders(){
            $sql = "SELECT * FROM company WHERE id = 1";

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$providersDetail = $stmt->fetch();
			
			$stmt->closeCursor();

            $this->providersDetail = $providersDetail;
        }
        
		public function getProvidersDetail(){
            $this->selectProviders();
            return $this->providersDetail;	
		}

        private function selectProvidersInvoices(){
            $sql2 = "SELECT * FROM invoice WHERE company_id = 1 ";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->execute();
            $providersInvoicesView = $stmt2->fetchAll();
            $stmt2->closeCursor();
            
            $this->providersInvoicesView = $providersInvoicesView;
        }

		public function getProvidersInvoices(){
            $this->selectProvidersInvoices();
            return $this->providersInvoicesView;	
		}
		
        private function selectProvidersContacts(){
            $sql3 = "SELECT * FROM person WHERE company_id = 1 ";
            $stmt3 = $this->pdo->prepare($sql3);
            $stmt3->execute();
            $providersContactsView = $stmt3->fetchAll();
            $stmt3->closeCursor();
            
            $this->providersContactsView = $providersContactsView;
        }

		public function getProvidersContacts(){
            $this->selectProvidersContacts();
            return $this->providersContactsView;	
		}
        
		
	}
