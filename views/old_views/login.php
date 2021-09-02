
<?php
  //const ROOT_PATH = '/opt/lampp/htdocs/projects/php/oop/PHPcogip';
  //require ROOT_PATH.'/assets/config/php/login.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Identification</title>
	<meta name="description" content="Hiking services">
	
	<link rel="stylesheet" href="../../assets/css/reset.css" type="text/css">
	<link rel="stylesheet" href="../../assets/css/style.css" type="text/css">
	
	<!--<script type="text/javascript">
			window.history.forward();
	</script>-->

</head>
<body>
<section id="banner">
	<div id="title" class="title-section">
		<h1 class="fs-16">COGIP</h1>
		<hr />
	</div>
</section>
<main class="w-25">
	<section id="banner">
		<div id="title" class="title-section">
			<h1>Login</h1>
		</div>
	</section>
	<section class="frm-layout">
		<div id="login-request">
			<form name="frm-login" id="frm-login"  action="" method="POST">
				<p class="mandatory">[ <span class="red">*</span> Indicates mandatory fields ]</p>
				<div class="mt-24">
					<label for="login">Login</label><span class="red">*</span>
					<input type="text" class="form-control" id="login" name="login" placeholder="login">
								 <!--value="</?php if(isset($_POST['login'])){ echo htmlentities($_POST['login']);}?>"
					>-->
				</div>
				<div>
					<label for="password">Password</label><span class="red">*</span>
					<input type="password" class="form-control" id="password" name="password" placeholder="password">
				</div>
				<div  class="mt-24">
					<a href="../../index.php">Not a member?</a>
				</div>
				<div  class="mt-24">
					<a href="../../index.php">Forgot your password?</a>
				</div>
				
				<input class="mt-24" type="submit" id="btn-login" name="btn-login">
				
				<div class="error mt-16"><?php if(isset($error)) { echo $error; } ?></div>
			</form>
		</div>
	</section>
</main>
	<?php require 'views/parts/footer.php';?>

