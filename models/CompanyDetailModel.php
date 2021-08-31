<?php

include_once "src/Config/Database.php";
	
	class CompanyDetailModel
	{
		protected $db;
		protected $pdo;
        protected $companyDetail;
		
		public function __construct() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
        private function selectCompany(){
            $sql = "SELECT * FROM company WHERE id = 1";

            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$companyDetail = $stmt->fetch();
			
			$stmt->closeCursor();

            $this->companyDetail = $companyDetail;
        }
        
		public function getCompanyDetail(){
            $this->selectCompany();
            return $this->companyDetail;	
		}

        private function selectCompanyInvoices(){
            $sql2 = "SELECT * FROM invoice WHERE company_id = 1 ";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->execute();
            $companyInvoicesView = $stmt2->fetchAll();
            $stmt2->closeCursor();
            
            $this->companyInvoicesView = $companyInvoicesView;
        }

		public function getCompanyInvoices(){
            $this->selectCompanyInvoices();
            return $this->companyInvoicesView;	
		}
		
        private function selectCompanyContacts(){
            $sql3 = "SELECT * FROM person WHERE company_id = 1 ";
            $stmt3 = $this->pdo->prepare($sql3);
            $stmt3->execute();
            $companyContactsView = $stmt3->fetchAll();
            $stmt3->closeCursor();
            
            $this->companyContactsView = $companyContactsView;
        }

		public function getCompanyContacts(){
            $this->selectCompanyContacts();
            return $this->companyContactsView;	
		}
        
		
	}
