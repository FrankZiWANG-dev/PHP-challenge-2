<?php
	require_once 'src/Router/Router.php';
	require_once "controllers/controller.php";

	$router = new Router($_GET['url']);
	
	//$controller = new Controller();
	
	//$router->get('/', function() use ($controller) { $controller->dashboard(); });
	$router->get('/', "Controller#dashboard");
	
	//$router->get('/dashboard', function() use ($controller)  { $controller->dashboard(); });
	$router->get('/dashboard', "Controller#dashboard");
	
	//$router->get('/logout', function() use ($controller) { $controller->logout(); });
	$router->get('/logout', "Controller#logout");
	
	$router->get('/create-person', "Controller#addNewPerson");
	$router->post('/create-person', "Controller#addNewPerson");
	
	$router->get('/create-invoice', "Controller#addNewInvoice");
	$router->post('/create-invoice', "Controller#addNewInvoice");
	
	$router->get('/create-company', "Controller#addNewCompany");
	$router->post('/create-company', "Controller#addNewCompany");
	
	// Update/Delete Company
	$router->get('/edit_company/:id', "Controller#editCompany")->with('id', '[0-9]+');
	$router->post('/edit_company/:id', "Controller#editCompany")->with('id', '[0-9]+');
	$router->get('/delete_company/:id', "Controller#deleteCompany")->with('id', '[0-9]+');
	$router->post('/delete_company/:id', "Controller#deleteCompany")->with('id', '[0-9]+');
	
	// Update/Delete Contact
	$router->get('/edit_contact/:id', "Controller#editContact")->with('id', '[0-9]+');
	$router->post('/edit_contact/:id', "Controller#editContact")->with('id', '[0-9]+');
	$router->get('/delete_contact/:id', "Controller#deleteContact")->with('id', '[0-9]+');
	$router->post('/delete_contact/:id', "Controller#deleteContact")->with('id', '[0-9]+');
	
	//Read Companies and people
	$router->get('/companies', "Controller#companyPage");
	$router->get('/companyDetail/:id', "Controller#companyDetailPage")->with('id', '[0-9]+');
	$router->get('/clients', "Controller#clientsPage");
	$router->get('/clientsDetail/:id', "Controller#clientsDetailPage")->with('id', '[0-9]+');
	$router->get('/providers', "Controller#providersPage");
	$router->get('/providersDetail/:id', "Controller#providersDetailPage")->with('id', '[0-9]+');
	$router->get('/people', "Controller#peoplePage");
	$router->get('/peopleDetail/:id', "Controller#peopleDetailPage")->with('id', '[0-9]+');

    // Login
    $router->get('/login', function() { $controller = new Controller(); $controller->login(); });
    $router->post('/login', function() { include_once "models/Auth/login.php"; });

    // Users
    $router->get('/users', function() { $controller = new Controller(); $controller->users(); });
    $router->get('/newUser', function() { $controller = new Controller(); $controller->newUser(); });
    $router->post('/newUser', function() { $controller = new Controller(); $controller->newUser(); });
    $router->get('/confirmDelete', function() { $controller = new Controller(); $controller->confirmDeleteUser(); });
    $router->get('/deleteUser', function() { $controller = new Controller(); $controller->deleteUser(); });
    $router->get('/updateUser', function() { $controller = new Controller(); $controller->updateUser(); });
    $router->post('/updateUser', function() { $controller = new Controller(); $controller->updateUser(); });
    $router->get('/invoice', function() { $controller = new Controller(); $controller->invoicesList(); });


//$router->get('/person:id', "Controller#editPerson")->with('id', '[0-9]+');
	
	
	//$router->get('/posts', function() { echo 'Tous les articles'; });
	
	
	//------testing router------------------------------------------------------------------------------------------------
	//with -> hans flux - chain arguments and methods
	/*$router->get('/article/:id-:slug', function($id,$slug) use ($router) {
	    //echo "Article $slug : $id";
        echo $router->url('posts.show', ['id' => 1, 'slug' => 'salut-les-gens']);
	}, 'posts.show')->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');
	*/
	
	// lines below (from 78 to 80) commented by Abdelilah
	//$router->get('/article/:slug-:id', "Controller#show2")->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');
	//$router->get('/article/:slug-:id/:page', "Controller#show")->with('id', '[0-9]+')->with('page', '[0-9]+')->with('slug', '[a-z\-0-9]+');
	//$router->get('/posts/:id',"Controller#showid"); //posts#show => posts controller and action=show
	
	//$router->get('/posts/:id',"Controller#showid"); //posts#show => posts controller and action=show
	//, function($id) {
	//?/>
		//<!--<form method="post" action="">
		//	<input type="text" name="name">
		//	<button type="submit">Envoyer</button>
		//</form>-->
	//</?php
	//});
	
	// line below (number 90) commented by Abdelilah
	//$router->post('/posts/:id', function($id) { echo 'Poster l\'article ' . $id . '<pre>' . print_r($_POST,true) . '</pre>'; });
	
	//$router->post('/login', function() {
	    //echo '<pre>' . print_r($_POST,true) . '</pre>';
	  //  include_once "src/Auth/login.php";
	//});
	
	//--------------------------------------------------------------------------------------------------------------------

	try {
		$router->run();
	} catch (RouterException $e) {
	    echo $e->getMessage();
	}
