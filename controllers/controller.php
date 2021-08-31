<?php
	require_once 'models/models.php';
	//require_once 'src/Helpers/Country.php';
	//require_once 'views/views.php';
	
	//include_once 'src/Config/Database.php';
	
	class Controller {
		
		protected $model;
		protected $company;
		protected $invoice;
		protected $person;
		protected $typeModel;
		protected $companyModel;
		protected $contactModel;
		
		public function __construct() {}
		
		public function show5() {
			echo "Bonjour";
		}
		
		public function show($slug,$id,$page) {
			echo "Article $id and the page is $page"; //. $_GET['page'];
		}
		
		public function showid($id) {
			echo "Article $id ";
		}
		
		public function show2($slug,$id) {
			echo "Article $id and the page is " . $_GET['page'];
		}
		
		public function show3() {
			echo "I am show3";
		}
		
		public function dashboard() {
			session_start ();
			if (!isset($_SESSION['login'])) {
				header("location: login");
				exit();
			}
			
			//get last five persons using person model
			$this->person = new PersonModel();
			$persons = $this->person->getLastFivePersons();
			
			//get last five companies using company model
			$this->company = new CompanyModel();
			$companies = $this->company->getLastFiveCompanies();
			
			//get last five invoices using invoice model
			$this->invoice = new InvoiceModel();
			$invoices = $this->invoice->getLastFiveInvoices();
			
			if($_SESSION['role'] == 'admin') {
				$edit_delete = "";
				$create = "";
			}
			else if($_SESSION['role']=='moderator'){
				$edit_delete = "class='invisible'";
				$create = "";
			}
			else {
				$edit_delete = "class='invisible'";
				$create 		= "class='invisible'";
			}
			//echo ("Hi ".$_SESSION['login']."\n");
			include_once "views/dashboard.php";
		}
		
		public function login() {
			include_once "views/login.php";
		}
		
		public function logout() {
			include_once "models/Auth/logout.php";
		}
		
		// ........ ADMIN ..........................................................................................//
		
		//Person creation
		private function showCreatePersonForm() {
			$this->model = new CompanyModel();
			$companies = $this->model->getCompanies();
			include_once "views/person.php";
		}
		
		public function addNewPerson() {
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-create-person'])) {
				$person = new PersonModel();
				
				$form_vars['firstname'] = $_POST["firstname"];
				$form_vars['lastname'] = $_POST["lastname"];
				$form_vars['email'] = $_POST["email"];
				$form_vars['company_id'] = $_POST["company"];
				
				try {
					$person->create($form_vars);
					header ('location: dashboard');
					exit();
				} catch (PersonException $e) {
					echo $e->getMessage();
				}
			}
			$this->showCreatePersonForm();
		}
		
		//Invoice Creation
		private function showCreateInvoiceForm() {
			$this->model = new CompanyModel();
			$companies = $this->model->getCompanies();
			
			$this->model = new PersonModel();
			$persons = $this->model->getPersons();
			
			include_once "views/invoice.php";
		}
		
		public function addNewInvoice() {
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-create-invoice'])) {
				
				$invoice = new InvoiceModel();
				
				$form_vars['number'] = $_POST["invoice_number"];
				$form_vars['date'] = $_POST["invoice_date"];
				$form_vars['company_id'] = $_POST["company"];
				$form_vars['person_id'] = $_POST["person"];
				
				try {
					$invoice->create($form_vars);
					header ('location: dashboard');
					exit();
				} catch (InvoiceException $e) {
					echo $e->getMessage();
				}
			}
			$this->showCreateInvoiceForm();
		}
		
		//Company Creation
		private function showCreateCompanyForm() {
			$this->model = new TypeModel();
			$types = $this->model->getTypes();
			include_once "views/company.php";
		}
		
		public function addNewCompany() {
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-create-company'])) {
				
				$company = new CompanyModel();
				
				$form_vars['name'] = $_POST["name"];
				$form_vars['country'] = $_POST["country"];
				$form_vars['vat'] = $_POST["vat"];
				$form_vars['type_id'] = $_POST["type"];
				
				try {
					$company->create($form_vars);
					header ('location: dashboard');
					exit();
				} catch (CompanyException $e) {
					echo $e->getMessage();
				}
			}
			$this->showCreateCompanyForm();
		}
		
		// Edit and update company
		private function showEditCompanyForm($id, $method) {
			$this->companyModel = new CompanyModel();
			$company = $this->companyModel->getCompanyById($id);
			$this->typeModel = new TypeModel();
			$types = $this->typeModel->getTypes();
			$action = $method;
			include_once "views/editCompany.php";
		}
		
		public function editCompany($id) {
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-save-company'])) {
				
				$company2 = new CompanyModel();
				
				$form_vars['name'] = $_POST["name"];
				$form_vars['country'] = $_POST["country"];
				$form_vars['vat'] = $_POST["vat"];
				$form_vars['type_id'] = $_POST["type"];
				$form_vars['company_id'] = $_POST["company_id"];
				
				//echo $form_vars['company_id'];
				
				//var_dump($form_vars);
				
				try {
					$company2->update($form_vars);
					header ('location: ../dashboard');
					exit();
				} catch (CompanyException $e) {
					echo $e->getMessage();
				}
			}
			$this->showEditCompanyForm($id,"update");
		}
		
		// delete company
		public function deleteCompany($id) {
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-delete-company'])) {
				
				$company = new CompanyModel();
				$company_id = $_POST["company_id"];
				
				try {
					$company->delete($company_id);
					header ('location: ../dashboard');
					exit();
				} catch (CompanyException $e) {
					echo $e->getMessage();
				}
			}
			$this->showEditCompanyForm($id,"delete");
		}
		
		// Edit and update Contact
		private function showEditContactForm($id, $method) {
			$this->contactModel = new PersonModel();
			$contact = $this->contactModel->getPersonById($id);
			
			$this->companyModel = new CompanyModel();
			$companies = $this->companyModel->getCompanies();
			$action = $method;
			
			include_once "views/editContact.php";
		}
		
		// Update Contact
		public function editContact($id) {
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-save-contact'])) {
				$this->contactModel = new PersonModel();
				
				$form_vars['firstname'] = $_POST["firstname"];
				$form_vars['lastname'] = $_POST["lastname"];
				$form_vars['email'] = $_POST["email"];
				$form_vars['company_id'] = $_POST["company"];
				$form_vars['person_id'] = $_POST["person_id"];
				
				try {
					$this->contactModel->update($form_vars);
					header ('location: ../dashboard');
					exit();
				} catch (PersonException $e) {
					echo $e->getMessage();
				}
			}
			$this->showEditContactForm($id,"update");
		}
		// delete contact
		public function deleteContact($id) {
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-delete-contact'])) {
				
				$contact = new PersonModel();
				$contact_id = $_POST["person_id"];
				
				try {
					$contact->delete($contact_id);
					header ('location: ../dashboard');
					exit();
				} catch (PersonException $e) {
					echo $e->getMessage();
				}
			}
			$this->showEditContactForm($id,"delete");
		}
		
		// ........ ADMIN ..........................................................................................//
		
	}