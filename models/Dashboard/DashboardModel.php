<?php
	
	include_once "src/Config/Database.php";
	
	class DashboardModel
	{
		protected $db;
		protected $pdo;
		
		public function __construct() {
			$this->getConnection();
		}
		
		private function getConnection() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
		public function getLastFiveInvoices()
		{
			$sql =
				"SELECT invoice.*, company.name
        FROM invoice,company
        WHERE invoice.company_id = company.id
        ORDER BY date DESC
        LIMIT 5";
			
			$stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$invoices = $stmt->fetchAll();
			
			$stmt->closeCursor();
			
			return $invoices;
		}
		
		public function getLastFiveCompanies()
		{
			$sql =
				"SELECT company.*, type.*, company.id AS companyId
        FROM company,type
        WHERE company.type_id = type.id ORDER BY company.id DESC
        LIMIT 5";
			
			$stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$companies = $stmt->fetchAll();
			
			$stmt->closeCursor();
			
			return $companies;
		}
		
		public function getLastFivePersons()
		{
			$sql =
				"SELECT person.*, company.name
        FROM person,company
        WHERE person.company_id = company.id
        ORDER BY person.id DESC
        LIMIT 5";
			
			$stmt = $this->pdo->prepare($sql);
			
			$stmt->execute();
			$persons = $stmt->fetchAll();
			
			$stmt->closeCursor();
			
			return $persons;
		}
	}

	
	
