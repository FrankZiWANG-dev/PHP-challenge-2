<?php require 'views/parts/headerlogin.php'; ?>

<main class="addlogin">
	<form class="addForm" name="frm-login" id="frm-login"  action="" method="POST">
		<div class="login">
			<label for="login">Login</label>
			<input type="text" class="form-control" id="login" name="login" placeholder="login">
		</div>
		<div class="login">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="password">
		</div>
		<div class="login">
			<input class="btn-login" type="submit" id="btn-login" name="btn-login" value="LOGIN">
		</div>
	</form>
</main>
