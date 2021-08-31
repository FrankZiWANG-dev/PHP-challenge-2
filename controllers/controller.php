<?php
	require_once 'models/models.php';
	// require_once 'views/views.php';
	
	class Controller {
		
		protected $model;
		
		public function __construct() {}
		
		public function dashboard() {
			session_start ();
			if (!isset($_SESSION['username'])) {
				header("location: login");
				exit();
			}
			$this->model = new DashboardModel();
			$invoices		= $this->model->getLastFiveInvoices();
			$companies	= $this->model->getLastFiveCompanies();
			$persons		= $this->model->getLastFivePersons();
			
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
			echo ("Hi ".$_SESSION['username']."\n");
			include_once "views/dashboard.php";
		}
		
		public function login() {
			include_once "views/login.php";
		}
		
		public function logout() {
			include_once "src/Auth/logout.php";
		}
		
		// ........ ADMIN ....... //
		public function addPerson() {
			$this->model = new PersonModel();
			//$data=getAddPerson();
			//$message = $data['0'];
			//$errorMessage = $data['1'];
			//$getCompany = getCompanyName();
			//require "views/admin/person.php";
		}

		public function companyPage() {
			$companyModel = new CompanyModel();
			$companyView = $companyModel->getCompanies();
		
			include_once "views/companyView.php";
		}

		public function companyDetailPage() {
			$companyDetailModel = new CompanyDetailModel();
			$companyDetailView = $companyDetailModel->getCompanyDetail();
			$companyInvoicesView = $companyDetailModel->getCompanyInvoices();
			$companyContactsView = $companyDetailModel->getCompanyContacts();
			include_once "views/companyDetailView.php";
		}
		
		public function clientsPage() {
			$clientsModel = new ClientsModel();
			$clientsView = $clientsModel->getClients();
		
			include_once "views/clientsView.php";
		}

		public function clientsDetailPage() {
			$clientsDetailModel = new ClientsDetailModel();
			$clientsDetailView = $clientsDetailModel->getClientsDetail();
			$clientsInvoicesView = $clientsDetailModel->getClientsInvoices();
			include_once "views/clientsDetailView.php";
		}

		public function providersPage() {
			$providersModel = new ProvidersModel();
			$providersView = $providersModel->getProviders();
		
			include_once "views/providersView.php";
		}

		public function providersDetailPage() {
			$providersDetailModel = new ProvidersDetailModel();
			$providersDetailView = $providersDetailModel->getProvidersDetail();
			$providersInvoicesView = $providersDetailModel->getProvidersInvoices();
			$providersContactsView = $providersDetailModel->getProvidersContacts();
			include_once "views/providersDetailView.php";
		}

		public function peoplePage() {
			$peopleModel = new PeopleModel();
			$peopleView = $peopleModel->getPeople();
		
			include_once "views/peopleView.php";
		}

		public function peopleDetailPage() {
			$peopleDetailModel = new PeopleDetailModel();
			$peopleDetailView = $peopleDetailModel->getPeopleDetail();
			$peopleInvoicesView = $peopleDetailModel->getPeopleInvoices();
			
			include_once "views/peopleDetailView.php";
		}
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
		
		$invoices		= lastFiveInvoices();
		$companies 	= lastFiveCompanies();
		$persons 		= lastFivePersons();
		
		
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
		echo ("Hi ".$_SESSION['login']."\n");
		require "views/dashboard.php";
	}
	
	function companyPage() {
	}
	
	function companyDetailPage() {
	}
	
	function clientsPage() {
	}
	
	function providersPage() {
	}
	
	function loginPage() {
		require "views/login.php";
	}
		
		//// ADMIN ////
		function addPersonPage() {
		}
	
		function deletePersonPage() {
		}
		*/
		
		// .....