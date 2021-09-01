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
		
        private function selectCompany($id){
            $sql = "SELECT * FROM company WHERE id = ?";
    
            $stmt = $this->pdo->prepare($sql);
			
			$stmt->execute([$id]);
			$companyDetail = $stmt->fetchAll();
			
			$stmt->closeCursor();

            $this->companyDetail = $companyDetail;
        }
        
		public function getCompanyDetail($id){
          
            $this->selectCompany($id);
            return $this->companyDetail;	
		}

        private function selectCompanyInvoices($id){
            $sql2 = "SELECT * FROM invoice WHERE company_id = ? ";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->execute([$id]);
            $companyInvoicesView = $stmt2->fetchAll();
            $stmt2->closeCursor();
            
            $this->companyInvoicesView = $companyInvoicesView;
        }

		public function getCompanyInvoices($id){
            $this->selectCompanyInvoices($id);
            return $this->companyInvoicesView;	
		}
		
        private function selectCompanyContacts($id){
            $sql3 = "SELECT * FROM person WHERE company_id = ? ";
            $stmt3 = $this->pdo->prepare($sql3);
            $stmt3->execute([$id]);
            $companyContactsView = $stmt3->fetchAll();
            $stmt3->closeCursor();
            
            $this->companyContactsView = $companyContactsView;
        }

		public function getCompanyContacts($id){
            $this->selectCompanyContacts($id);
            return $this->companyContactsView;	
		}
        
		
	}
