<?php
	require_once 'src/Config/Database.php';
	include_once 'User.php';
	
	session_start ();
	
	//check if variables are defined
	if (isset($_POST['login']) && isset($_POST['password'])) {
		
		$db = new Database();
		$pdo = $db->connect();
		$user = new User($pdo);
		
		try {
			echo '<pre>' . print_r($_POST, true) . '</pre>';
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			
			//attempts to log
			//$user->login($login,$password);
			
			//save session
			//session_start ();
			// save session variables for user ($login et $password)
			$_SESSION['login'] = "jean-christian"; //$_POST['login'];
			$_SESSION['role'] = "user"; //$_POST['role'];
			//echo $_SESSION['role'];
			//redirect to dashboard page
			header ('location: dashboard');
			
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	} /*else {
		header ('location: login');
		exit();
	}*/

