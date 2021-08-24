<?php
	
	function personDetailPage() {
		//require "models/...";
		//$persons = getDetailPerson();
		//require "views/personDetails.php";
	}
	
	function invoicePage() {
		/*require "models/invoice.php";
		$invoices = readInvoices();
		require "views/invoice.php";*/
	}
	
	function invoiceDetailPage() {
		/*require "models/invoice.php";
		$invoiceDetail = invoiceDetail();
		require "views/invoiceDetail.php";*/
	}
	
	function dashboard() {
		require "models/dashboard.php";
		
		$invoices		= lastFiveInvoices();
		$companies 	= lastFiveCompanies();
		$persons 		= lastFivePersons();
		
		$editDelete = ""; //'class="invisible"' display: none;
		$create = "";
		
		if($_SESSION['role'] == 'admin') {
			$editDelete = "";
			$create = "";
		}
		else if($_SESSION['role']=='user'){
			$editDelete = "class='invisible'";  //.invisible { display: none }
			$create = "";
		}
		else {
			$editDelete = "class='invisible'";
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
		
		// .....