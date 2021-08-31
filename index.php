<?php
	require_once 'src/Router/Router.php';
	require_once "controllers/controller.php";
	
	
	//$controller = new Controller();
	$router = new Router($_GET['url']);
	
	$router->get('/', function() { $controller = new Controller(); $controller->dashboard(); });
	$router->get('/dashboard', function() { $controller = new Controller(); $controller->dashboard(); });
	$router->get('/login', function() { $controller = new Controller(); $controller->login(); });
	$router->get('/logout', function() { $controller = new Controller(); $controller->logout(); });
	$router->get('/companies', function(){ $controller = new Controller(); $controller->companyPage();});
	$router->get('/companyDetail', function(){ $controller = new Controller(); $controller->companyDetailPage();});
	$router->get('/clients', function(){ $controller = new Controller(); $controller->clientsPage();});
	$router->get('/clientsDetail', function(){ $controller = new Controller(); $controller->clientsDetailPage();});
	$router->get('/providers', function(){ $controller = new Controller(); $controller->providersPage();});
	$router->get('/providersDetail', function(){ $controller = new Controller(); $controller->providersDetailPage();});
	$router->get('/people', function(){ $controller = new Controller(); $controller->peoplePage();});
	$router->get('/peopleDetail', function(){ $controller = new Controller(); $controller->peopleDetailPage();});
	// $router->get('/posts', function() { echo 'Tous les articles'; });
	// $router->get('/posts/:slug-:id', function($slug,$id) { echo "Article $slug : $id"; });
	// $router->get('/posts/:id', function($id) {
	?>
		<!-- <form method="post" action="">
			<input type="text" name="name">
			<button type="submit">Envoyer</button>
		</form> -->
	<?php
	// });
	// $router->post('/posts/:id', function($id) { echo 'Poster l\'article ' . $id . '<pre>' . print_r($_POST,true) . '</pre>'; });
	$router->post('/login', function() {
	    //echo '<pre>' . print_r($_POST,true) . '</pre>';
	    include_once "src/Auth/login.php";
	});
	
	//try {
		$router->run();
	//} catch (RouterException $e) {
	//    echo $e->getMessage();
	//}

