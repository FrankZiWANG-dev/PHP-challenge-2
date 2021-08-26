<?php require 'views/parts/header.php';?>
<section>
	<div class="">
		<div class="">
			<form method="post" action="">
				<div class="">
					<div class=""><label>Firstname :</label></div>
					<div class=""><input type="text" name="firstname"></div>
					<div class=""><?=$errorMessage['0']?></div>
				</div>
				<div class="">
					<div class=""><label>Lastname :</label></div>
					<div class=""><input type="text" name="lastname"></div>
					<div class=""><?=$errorMessage['1']?></div>
				</div>
				<div class="">
					<div class=""><label>Email :</label></div>
					<div class=""><input type="email" name="email"></div>
					<div class=""><?=$errorMessage['3']?></div>
				</div>
				<div class="">
					<div class=""><label>Company :</label></div>
					<div class="">
						<select name='company'>
							<?php foreach ($getCompany as $company) {
								echo "<option value='".$company['id']."'>".$company['name']."</option>";
							} ?>
						</select>
					</div>
					<div class=""><?=$errorMessage['4']?></div>
				</div>
				<div class="row">
					<div class="">
						<input type="submit" name="submit" value="Add"></div>
				</div>
			</form>
			<div class="">
				<div class="">
					<?=$message?></div>
			</div>
		</div>
	</div>
</section>
<?php require 'views/parts/footer.php';?>
