<?php
	require 'Database.php';
	
	//check if variables are defined
	if (isset($_POST['login']) && isset($_POST['password'])) {
		$db = new Database();
		$pdo = $db->connect();
		$user = new User($pdo);
		
		try {
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			//attempts to log
			$user->login($login,$password);
			
			//save session
			session_start ();
			// save session variables for user ($login et $password)
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['role'] = $_POST['role'];
			
			//redirect to dashboard page
			header ('location:../../../?page=dashboard');
			
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	} else {
		header ('location:../../../?page=login');
		exit();
	}

