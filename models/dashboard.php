<?php
	function lastFiveInvoices() {
		require "../assets/config/php/Database.php";
		$sql =
			"SELECT invoice.*, company.name
        FROM invoice,company
        WHERE invoice.company_id = company.id
        ORDER BY date DESC
        LIMIT 5";
		
		$db = new Database();
		$pdo = $db->connect();
		$stmt = $pdo->prepare($sql);
		
		$stmt->execute();
		$invoices = $stmt->fetchAll();
		
		$stmt->closeCursor();
		
		return $invoices;
	}
	
	function lastFiveCompanies() {
		require "../assets/config/php/Database.php";
		$sql =
			"SELECT company.*, type.*, company.id AS companyId
        FROM company,type
        WHERE company.type_id = type.id ORDER BY company.id DESC
        LIMIT 5";
		
		$db = new Database();
		$pdo = $db->connect();
		$stmt = $pdo->prepare($sql);
		
		$stmt->execute();
		$companies = $stmt->fetchAll();
		
		$stmt->closeCursor();
		
		return $companies;
	}
	
	function lastFivePersons(){
		require "assets/config/php/config.php";
		$sql =
			"SELECT person.*, company.name
        FROM person,company
        WHERE person.company_id = company.id
        ORDER BY person.id DESC
        LIMIT 5";
		
		$db = new Database();
		$pdo = $db->connect();
		$stmt = $pdo->prepare($sql);
		
		$stmt->execute();
		$persons = $stmt->fetchAll();
		
		$stmt->closeCursor();
		
		return $persons;
	}

