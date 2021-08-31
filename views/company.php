<?php
  require 'views/parts/header.php';
  require_once 'src/Helpers/Country.php';
?>

<main class="">
	<section id="">
		<div id="title" class="">
			<h1>Adding company</h1>
		</div>
	</section>
	<section class="">
		<div id="add-person-request">
			<form name="frm-add-company" id="frm-add-company"  action="" method="POST">
				<p class="mandatory">[ <span class="red">*</span> Indicates mandatory fields ]</p>
				<div class="mt-24">
					<label for="name">Name</label><span class="red">* </span>
					<input type="text" class="" id="name" name="name" placeholder="company name"
								 value="<?php if(isset($_POST['name'])){ echo htmlentities($_POST['name']);}?>"
					>
				</div>
				<div class="mt-24">
					<label for="country">Country</label><span class="red">* </span>
					<select class="" name="country" id="country">
                        <?php foreach ($countries as $k => $v) { ?>
                          <option value="<?= $v; ?>" <?php if ($k === 'BE') echo "selected"; ?> ><?= $v; ?></option>
                        <?php } ?>
					</select>
				</div>
				<div class="mt-24">
					<label for="vat">Vat</label><span class="red">* </span>
					<input type="text" class="form-control" id="vat" name="vat" placeholder="vat"
								 value="<?php if(isset($_POST['vat'])){ echo $_POST['vat'];}?>"
					>
				</div>
				<div class="mt-24">
					<label for="type">Type</label><span class="red">* </span>
					<select class="" name='type' id="type">
						<?php foreach ($types as $type) {
							echo "<option value='".$type['id']."'>".$type['type']."</option>";
						} ?>
					</select>
				</div>
				
				
				<input class="mt-24" type="submit" id="btn-create-company" name="btn-create-company" value="Create">
                <input type="button" onclick="window.location.href = 'dashboard';" value="Cancel"/>
				
				<div class="error mt-16"><?php if(isset($error)) { echo $error; } ?></div>
			</form>
		</div>
	</section>
</main>
<?php echo '<br/>'; ?>
<?php require 'views/parts/footer.php';?>
