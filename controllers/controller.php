<?php
	require_once 'models/models.php';
	//require_once 'src/Helpers/Country.php';
	//require_once 'views/views.php';
	
	//include_once 'src/Config/Database.php';
	
	class Controller
	{
		
		protected $model;
		protected $company;
		protected $invoice;
		protected $person;
		protected $typeModel;
		protected $companyModel;
		protected $contactModel;
		
		public function __construct()
		{
		}
		
		
		//lines below (from 27 to 31) commented by Abdelilah
		/*
		public function show5(){echo "Bonjour";}
		public function show($slug, $id, $page){echo "Article $id and the page is $page";} //. $_GET['page'];
		public function showid($id){echo "Article $id ";}
		public function show2($slug, $id){echo "Article $id and the page is " . $_GET['page'];}
		public function show3(){echo "I am show3";}
		*/
		
		public function dashboard()
		{
			session_start();
			if (!isset($_SESSION['username'])) {
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
			
			/* Lines from 55 to 64 commented by Abdelilah*/
			if ($_SESSION['role'] == 'admin') {
				$edit_delete = "";
				$create = "";
			} else if ($_SESSION['role'] == 'moderator') {
				$edit_delete = "class='invisible'";
				$create = "";
			} else {
				$edit_delete = "class='invisible'";
				$create = "class='invisible'";
			}
			/* Abdelilah */
			//echo ("Hi ".$_SESSION['login']."\n");
			include_once "views/dashboard.php";
		}
		
		public function login()
		{
			include_once "views/login.php";
		}
		
		public function logout()
		{
			include_once "models/Auth/logout.php";
		}
		
		// ........ ADMIN ..........................................................................................//
		
		//Person creation
		/* Abdelilah
		private function showCreatePersonForm()
		{
			$this->model = new CompanyModel();
			$companies = $this->model->getCompanies();
			include_once "views/person.php";
		}
		
		public function addNewPerson()
		{
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-create-person'])) {
				$person = new PersonModel();
				
				$form_vars['firstname'] = $_POST["firstname"];
				$form_vars['lastname'] = $_POST["lastname"];
				$form_vars['email'] = $_POST["email"];
				$form_vars['company_id'] = $_POST["company"];
				
				try {
					$person->create($form_vars);
					header('location: dashboard');
					exit();
				} catch (PersonException $e) {
					echo $e->getMessage();
				}
			}
			$this->showCreatePersonForm();
		}
		
		//Invoice Creation
		private function showCreateInvoiceForm()
		{
			$this->model = new CompanyModel();
			$companies = $this->model->getCompanies();
			
			$this->model = new PersonModel();
			$persons = $this->model->getPersons();
			
			include_once "views/invoice.php";
		}
		* Abdelilah */
		
		public function companyPage()
		{
			$companyModel = new CompanyModel2();
			$companyView = $companyModel->getCompanies();
			include_once "views/companyView.php";
		}
		
		/* Abdelilah
		public function addNewInvoice()
		{
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-create-invoice'])) {
				
				$invoice = new InvoiceModel();
				
				$form_vars['number'] = $_POST["invoice_number"];
				$form_vars['date'] = $_POST["invoice_date"];
				$form_vars['company_id'] = $_POST["company"];
				$form_vars['person_id'] = $_POST["person"];
				
				try {
					$invoice->create($form_vars);
					header('location: dashboard');
					exit();
				} catch (InvoiceException $e) {
					echo $e->getMessage();
				}
			}
			$this->showCreateInvoiceForm();
		}
		* Abdelilah */
		
		public function companyDetailPage($id)
		{
			$companyDetailModel = new CompanyDetailModel();
			$companyDetailView = $companyDetailModel->getCompanyDetail($id);
			$companyInvoicesView = $companyDetailModel->getCompanyInvoices($id);
			$companyContactsView = $companyDetailModel->getCompanyContacts($id);
			include_once "views/companyDetailView.php";
		}
		
		//Company Creation
		/* Abdelilah
		private function showCreateCompanyForm()
		{
			$this->model = new TypeModel();
			$types = $this->model->getTypes();
			include_once "views/company.php";
		}
		* Abdelilah */
		
		public function clientsPage()
		{
			$clientsModel = new ClientsModel();
			$clientsView = $clientsModel->getClients();
			include_once "views/clientsView.php";
		}
		
		public function clientsDetailPage($id)
		{
			$clientsDetailModel = new ClientsDetailModel();
			$clientsDetailView = $clientsDetailModel->getClientsDetail($id);
			$clientsInvoicesView = $clientsDetailModel->getClientsInvoices($id);
			include_once "views/clientsDetailView.php";
		}
		
		public function providersPage()
		{
			$providersModel = new ProvidersModel();
			$providersView = $providersModel->getProviders();
			
			include_once "views/providersView.php";
		}
		
		public function providersDetailPage($id)
		{
			$providersDetailModel = new ProvidersDetailModel();
			$providersDetailView = $providersDetailModel->getProvidersDetail($id);
			$providersInvoicesView = $providersDetailModel->getProvidersInvoices($id);
			$providersContactsView = $providersDetailModel->getProvidersContacts($id);
			include_once "views/providersDetailView.php";
		}
		
		public function peoplePage()
		{
			$peopleModel = new PeopleModel();
			$peopleView = $peopleModel->getPeople();
			
			include_once "views/peopleView.php";
		}
		
		public function peopleDetailPage($id)
		{
			$peopleDetailModel = new PeopleDetailModel();
			$peopleDetailView = $peopleDetailModel->getPeopleDetail($id);
			$peopleInvoicesView = $peopleDetailModel->getPeopleInvoices($id);
			
			include_once "views/peopleDetailView.php";
		}
		
		public function users()
		{
			session_start();
			if (!isset($_SESSION['username'])) {
				header("location: login");
				exit();
			}
			require_once 'models/Auth/User.php';
			
			$users = new User();
			$usersData = $users->displayUsers();
			
			if ($_SESSION['role'] == 'admin') {
				$displayBtn = '<button class="Btn-add"><a class="btn-lien" href="newUser">Create new user</a></button>';
			} else {
				$displayBtn = '';
			}
			//echo("Hi " . $_SESSION['username'] . "\n");
			include_once "views/User_admin.vue.php";
		}
		
		public function newUser()
		{
			session_start();
			if (!($_SESSION['role'] === 'admin')) {
				header("location: dashboard");
				exit();
			}
			require_once 'models/Auth/User.php';
			
			$users = new User();
			$users->newUser();
			
			include_once "views/newUser.php";
		}
		
		public function confirmDeleteUser()
		{
			session_start();
			if (!($_SESSION['role'] === 'admin')) {
				header("location: dashboard");
				exit();
			}
			require_once 'models/Auth/User.php';
			
			$users = new User();
			$userData = $users->selectById();
			
			if ($_SESSION['role'] == 'admin') {
				$displayBtn =
					'<button><a href="newUser">Create new user</a></button>' .
					'<button><a href="users">Users</a></button>';
			} else {
				$displayBtn = '';
			}
			//echo("Hi " . $_SESSION['username'] . "\n");
			include_once "views/confirmDeleteUser.php";
		}
		
		public function deleteUser()
		{
			session_start();
			if (!($_SESSION['role'] === 'admin')) {
				header("location: dashboard");
				exit();
			}
			require_once 'models/Auth/User.php';
			
			$users = new User();
			$users->deleteUser();
			
		}
		
		public function updateUser()
		{
			session_start();
			if (!($_SESSION['role'] === 'admin' || 'moderator')) {
				header("location: dashboard");
				exit();
			}
			require_once 'models/Auth/User.php';
			
			$user = new User();
			$userValue = $user->selectById();
			
			if ($_SESSION['role'] == 'admin') {
				$displayBtn = '<button><a href="newUser">Create new user</a></button>';
			} else {
				$displayBtn = '';
			}
			//echo("Hi " . $_SESSION['username'] . "\n");
			
			$is_set =
				isset($_POST['username']) &&
				isset($_POST['email']) &&
				isset($_POST['role']);
			
			$is_not_empty =
				!empty($_POST['username']) &&
				!empty($_POST['email']) &&
				!empty($_POST['role']);
			
			if ($is_set && $is_not_empty) {
				$userUpdate = $user->updateUser();
			}
			
			include_once "views/updateUser.php";
		}

        public function editInvoice()
        {
            session_start();
            if (!($_SESSION['role'] === 'admin')) {
                header("location: dashboard");
                exit();
            }
            require_once 'models/Invoice/InvoiceModel.php';

            $companies = new CompanyModel();
            $companyList = $companies->getCompanies();

            $invoices = new InvoiceModel();
            $invoicesId = $invoices->selectById();



            $is_set =
                isset($_POST['number']) &&
                isset($_POST['date']) &&
                isset($_POST['company']);

            $is_not_empty =
                !empty($_POST['number']) &&
                !empty($_POST['date']) &&
                !empty($_POST['company']);

            if ($is_set && $is_not_empty) {
                $invoiceUpdate = $invoices->updateInvoice();
            }

            include_once "views/editInvoice.php";
        }

        public function confirmDeleteInvoice()
        {
            session_start();
            if (!($_SESSION['role'] === 'admin')) {
                header("location: dashboard");
                exit();
            }
            require_once 'models/Invoice/InvoiceModel.php';

            $invoices = new InvoiceModel();
            $invoicesId = $invoices->selectById();


            include_once "views/deleteInvoice.php";
        }

        public function deleteInvoice()
        {
            session_start();
            if (!($_SESSION['role'] === 'admin')) {
                header("location: dashboard");
                exit();
            }
            require_once 'models/Invoice/InvoiceModel.php';

            $invoices = new InvoiceModel();
            $invoices->deleteInvoice();

        }

		public function invoicesList()
		{
			session_start();
			if (!isset($_SESSION['username'])) {
				header("location: login");
				exit();
			}
			require_once 'models/Invoice/InvoiceModel.php';
			
			$invoices = new InvoiceModel();
			$invoicesList = $invoices->displayInvoices();

			include_once "views/invoicesList.vue.php";
		}

	
		// #Admin added by Abdelilah
		// #ADMIN ..........................................................................................//
		
		//Person creation
		private function showCreatePersonForm() {
			$this->model = new CompanyModel();
			$companies = $this->model->getCompanies();
			include_once "views/person.php";
		}
		
		public function addNewPerson() {
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
            session_start();
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
            session_start();
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
            session_start();
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
            session_start();
            if (!($_SESSION['role'] === 'admin')) {
                header("location: ../dashboard");
                exit();
            }
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
            session_start();
            if (!($_SESSION['role'] == 'admin')) {
                header("location: ../dashboard");
                exit();
            }
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
            session_start();
            if (!($_SESSION['role'] === 'admin')) {
                header("location: ../dashboard");
                exit();
            }
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
            session_start();
            if (!($_SESSION['role'] === 'admin')) {
                header("location: ../dashboard");
                exit();
            }
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
		
		// #ADMIN ..........................................................................................//
	
	
	
	}
		
	
		/*
		function personDetailPage() {
			require "models/...";
			$persons = getDetailPerson();
			require "views/personDetails.php";
		}
		
		function invoicePage() {
			require "models/invoice.php";
			$invoices = readInvoices();
			require "views/invoice.php";
		}
		
		function invoiceDetailPage() {
			require "models/invoice.php";
			$invoiceDetail = invoiceDetail();
			require "views/invoiceDetail.php";
		}
		
		function dashboard() {
			require "models/DashboardModel.php";
			
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
		private function showEditCompanyForm($id, $method)
		{
			$this->companyModel = new CompanyModel();
			$company = $this->companyModel->getCompanyById($id);
			$this->typeModel = new TypeModel();
			$types = $this->typeModel->getTypes();
			$action = $method;
			include_once "views/editCompany.php";
		}
		
		public function editCompany($id)
		{
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
					header('location: ../dashboard');
					exit();
				} catch (CompanyException $e) {
					echo $e->getMessage();
				}
			}
			$this->showEditCompanyForm($id, "update");
		}
		
		// delete company
		public function deleteCompany($id)
		{
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-delete-company'])) {
				
				$company = new CompanyModel();
				$company_id = $_POST["company_id"];
				
				try {
					$company->delete($company_id);
					header('location: ../dashboard');
					exit();
				} catch (CompanyException $e) {
					echo $e->getMessage();
				}
			}
			$this->showEditCompanyForm($id, "delete");
		}
		
		// Edit and update Contact
		private function showEditContactForm($id, $method)
		{
			$this->contactModel = new PersonModel();
			$contact = $this->contactModel->getPersonById($id);
			
			$this->companyModel = new CompanyModel();
			$companies = $this->companyModel->getCompanies();
			$action = $method;
			
			include_once "views/editContact.php";
		}
		
		// Update Contact
		public function editContact($id)
		{
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
					header('location: ../dashboard');
					exit();
				} catch (PersonException $e) {
					echo $e->getMessage();
				}
			}
			$this->showEditContactForm($id, "update");
		}
		
		// delete contact
		public function deleteContact($id)
		{
			//echo '<pre>' . print_r($_POST, true) . '</pre>';
			if (isset($_POST['btn-delete-contact'])) {
				
				$contact = new PersonModel();
				$contact_id = $_POST["person_id"];
				
				try {
					$contact->delete($contact_id);
					header('location: ../dashboard');
					exit();
				} catch (PersonException $e) {
					echo $e->getMessage();
				}
			}
			$this->showEditContactForm($id, "delete");
		}
		
	*/