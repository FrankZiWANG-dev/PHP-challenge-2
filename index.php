<?php
	
	session_start();
	if(!isset($_GET["page"])) {
		$_GET["page"]="";
	}
	
	switch ($_GET["page"]) {
		
		/*case 'person_detail':
			require "controllers/controller.php";
			personDetailPage();
			break;*/
		case 'invoice':
			require "controllers/controller.php";
			invoicePage();
			break;
		/*
		case 'add_invoice':
			require "controllers/controller.php";
			addInvoicePage();
			break;
			
		case 'update_invoice':
			require "controllers/controller.php";
			updateInvoicePage();
			break;
			
		case 'delete_invoice':
			require "controllers/controller.php";
			deleteInvoicePage();
			break;
			
		case 'invoice_detail':
			require "controllers/controller.php";
			detailInvoicePage();
			break;*/
			
		/*case 'company':
			require "controllers/controller.php";
			companyPage();
			break;
		
		case 'company_detail':
			require "controllers/controller.php";
			detailCompanyPage();
			break;*/
		
		case 'admin':
			
			switch ($_GET["action"]){
				case 'add_person':
					require "controllers/controller.php";
					addPersonPage();
					break;
				/*
				case 'update_person':
					require "controllers/controller.php";
					updatePersonPage();
					break;
				
				case 'delete_person':
					require "controllers/controller.php";
					deletePersonPage();
					break;
				
				case 'add_invoice':
					require "controllers/controller.php";
					addInvoicePage();
					break;
				
				case 'update_invoice':
					require "controllers/controller.php";
					updateInvoicePage();
					break;
				
				case 'delete_invoice':
					require "controllers/controller.php";
					deleteInvoicePage();
					break;
				
				case 'add_company':
					require "controllers/controller.php";
					addCompanyPage();
					break;
				
				case 'update_company':
					require "controllers/controller.php";
					updateCompanyPage();
					break;
				
				case 'delete_company':
					require "controllers/controller.php";
					deleteCompanyPage();
					break;*/
			}
			break;
		/*
		case 'client':
			require "controllers/controller.php";
			clientsPage();
			break;
		
		case 'provider':
			require "controllers/controller.php";
			providersPage();
			break;
		
		case 'dashboard':
			require "controllers/controller.php";
			dashboard();
			break;
		*/
		default:
			require "controllers/controller.php";
			if (isset($_SESSION['role'])) {
				dashboard();
			} else { loginPage(); }
			
			break;
	}
