<?php
	session_start ();
	require_once 'src/Config/Database.php';
	require_once 'models/User.php';


	//check if variables are defined
    $is_set =
        isset($_POST['login']) &&
        isset($_POST['password']);

    $is_not_empty =
        !empty($_POST['login']) &&
        !empty($_POST['password']);

	if ($is_set && $is_not_empty) {
		try {
            $user = new User();
			$login = $_POST['login'];
			$password = $_POST['password'];
            $user->login($login, $password);
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	} else {
		header ('location: login');
		exit();
	}

