<?php
	require_once 'models/models.php';
	//require_once 'views/views.php';
	
	class Controller {
		
		protected object $model;
		
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

        public function users()
        {
            session_start ();
            if (!isset($_SESSION['username'])) {
                header("location: login");
                exit();
            }
            require_once 'src/Auth/User.php';

//            if($_SESSION['role'] == 'admin') {
//                $edit_delete = "";
//                $create = "";
//            }
//            else if($_SESSION['role']=='moderator'){
//                $edit_delete = "class='invisible'";
//                $create = "";
//            }
//            else {
//                $edit_delete = "class='invisible'";
//                $create 		= "class='invisible'";
//            }
            echo ("Hi ".$_SESSION['username']."\n");
            include_once "views/User_admin.vue.php";
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