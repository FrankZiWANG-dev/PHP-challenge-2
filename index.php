<?php
	require_once 'src/Router/Router.php';
	require_once "controllers/controller.php";
	
	$router = new Router($_GET['url']);
	
	$router->get('/', function() { $controller = new Controller(); $controller->dashboard(); });
	$router->get('/dashboard', function() { $controller = new Controller(); $controller->dashboard(); });
	$router->get('/users', function() { $controller = new Controller(); $controller->users(); });
	$router->get('/newUser', function() { $controller = new Controller(); $controller->newUser(); });
	$router->post('/newUser', function() { $controller = new Controller(); $controller->newUser(); });
	$router->get('/deleteUser', function() { $controller = new Controller(); $controller->deleteUser(); });
	$router->get('/updateUser', function() { $controller = new Controller(); $controller->updateUser(); });
	$router->post('/updateUser', function() { $controller = new Controller(); $controller->updateUser(); });
	$router->get('/login', function() { $controller = new Controller(); $controller->login(); });
	$router->get('/logout', function() { $controller = new Controller(); $controller->logout(); });
	$router->post('/login', function() { include_once "src/Auth/login.php"; });
    $router->get('/invoice', function() { $controller = new Controller(); $controller->invoicesList(); });


try {
        $router->run();
    } catch (RouterException $e) {
        echo $e->getMessage();
    }

//echo "<pre>";
//echo "Session : ";
//print_r($_SESSION);
//echo "Post : ";
//print_r($_POST);
//echo "Get : ";
//print_r($_GET);
//echo "</pre>";