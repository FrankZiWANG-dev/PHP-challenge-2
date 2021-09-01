<?php
	
	include_once 'InvoiceException.php';
	include_once 'InvoiceInterface.php';
	include_once 'src/Helpers/Helper.php';
	include_once 'src/Config/Database.php';
	
	class InvoiceModel implements InvoiceInterface
	{
		protected $db;
		protected $pdo;
		protected $vars;
		protected $lastFiveInvoices;
		
		public function __construct() {
			$this->getConnection();
		}
		
		private function getConnection() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
		//Last five invoices
		private function setLastFiveInvoices()
		{
			$sql =
				"SELECT invoice.*, company.name
        FROM invoice,company
        WHERE invoice.company_id = company.id
        ORDER BY date DESC
        LIMIT 5";
			
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$lastFiveInvoices = $stmt->fetchAll();
			$stmt->closeCursor();
			$this->lastFiveInvoices = $lastFiveInvoices;
		}
		
		public function getLastFiveInvoices()
		{
			$this->setLastFiveInvoices();
			return $this->lastFiveInvoices;
		}
		
		
		/**
		 * @throws InvoiceException
		 */
		public function create(array $form_vars = array()) {
			$this->vars['number'] = $form_vars['number'];
			$this->vars['date'] = $form_vars['date'];
			$this->vars['company_id'] = $form_vars['company_id'];
			$this->vars['person_id'] = $form_vars['person_id'];
			
			//check if all field are not empty
			if (!filled_out($this->vars)) {
				throw new InvoiceException('You have not filled the form correctly, please go back and try again.');
			}
			
			//check number if respect pattern ^[F][0-9]{5}
			if (!invoicePattern($this->vars['number'])) {
				throw new InvoiceException('Invoice number must start with F + 5 digits, please try again.');
			}
			
			//check if invoice number is already take
			if ($this->invoiceNumberAlreadyExist($this->vars['number'])) {
				throw new InvoiceException('Invoice number is already in use');
			}
			
			//attempts to create the invoice
			if (!$this->addNewInvoice($this->vars)) {
				throw new InvoiceException("Could not create invoice in database, please try again later.");
			}
			
			// all check are ok
		}
		
		protected function invoiceNumberAlreadyExist($number)
		{
			$query = $this->pdo->prepare("SELECT * FROM invoice WHERE number = ?");
			$query->execute(array($number));
			$invoiceExist = $query->rowCount();
			return $invoiceExist != 0;
		}
		
		protected function addNewInvoice($data) {
			$stmt = $this->pdo->prepare("INSERT INTO invoice (number, date, company_id, person_id) VALUES(?, ?, ?, ?)");
			$result = $stmt->execute(array($data['number'],$data['date'],$data['company_id'],$data['person_id']));
			if (!$result) return false;
			return true;
		}

        public function displayInvoices()
        {
            $log = $this->pdo->prepare("SELECT * FROM invoice LEFT JOIN company ON invoice.compagny_id = company.id");
            $log->execute();
            return $log->fetchAll();
        }

//SELECT
//	number as invoice_number,
//	date as invoice_date,
//    name as compagny_name
//FROM invoice
//INNER JOIN company
//   ON invoice.company_id = company.id
		
		public function edit($invoice_id) {}
		public function delete($invoice_id) {}
		
	}