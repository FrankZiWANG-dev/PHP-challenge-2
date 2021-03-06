<?php
	require_once 'src/Router/Router.php';
	require_once "controllers/old_controller.php";
	
	
	//$controller = new Controller();
	$router = new Router($_GET['url']);
	
	$router->get('/', function() { $controller = new Controller(); $controller->dashboard(); });
	$router->get('/dashboard', function() { $controller = new Controller(); $controller->dashboard(); });
	$router->get('/login', function() { $controller = new Controller(); $controller->login(); });
	$router->get('/logout', function() { $controller = new Controller(); $controller->logout(); });
	$router->get('/companies', function(){ $controller = new Controller(); $controller->companyPage();});
	$router->get('/posts', function() { echo 'Tous les articles'; });
	$router->get('/posts/:slug-:id', function($slug,$id) { echo "Article $slug : $id"; });
	$router->get('/posts/:id', function($id) {
	?>
		<form method="post" action="">
			<input type="text" name="name">
			<button type="submit">Envoyer</button>
		</form>
	<?php
	});
	$router->post('/posts/:id', function($id) { echo 'Poster l\'article ' . $id . '<pre>' . print_r($_POST,true) . '</pre>'; });
	$router->post('/login', function() {
	    //echo '<pre>' . print_r($_POST,true) . '</pre>';
	    include_once "src/Auth/login.php";
	});
	
	//try {
		$router->run();
	//} catch (RouterException $e) {
	//    echo $e->getMessage();
	//}

