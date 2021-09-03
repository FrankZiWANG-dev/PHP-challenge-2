<?php
  require 'views/parts/header.php';
  require_once 'src/Helpers/Country.php';
?>

<h1>Create a new company</h1>	
		
	<main class="addlogin">
	<section class="addForm login" >
        <div>
			<form name="frm-add-company" id="frm-add-company"  action="" method="POST">
				<p>[ <span class="red">*</span> Mandatory fields ]</p>
				<div class="marginTop">
					<label for="name">Name</label><span class="red">* </span>
					<input type="text" id="name" name="name" placeholder="company name"
								 value="<?php if(isset($_POST['name'])){ echo htmlentities($_POST['name']);}?>"
					>
				</div>
				<div class="marginTop">
					<label for="country">Country</label><span class="red">* </span>
					<select name="country" id="country">
                        <?php foreach ($countries as $k => $v) { ?>
                          <option value="<?= $v; ?>" <?php if ($k === 'BE') echo "selected"; ?> ><?= $v; ?></option>
                        <?php } ?>
					</select>
				</div>
				<div class="marginTop">
					<label for="vat">Vat</label><span class="red">* </span>
					<input type="text" class="form-control" id="vat" name="vat" placeholder="vat"
								 value="<?php if(isset($_POST['vat'])){ echo $_POST['vat'];}?>"
					>
				</div>
				<div class="marginTop">
					<label for="type">Type</label><span class="red">* </span>
					<select name='type' id="type">
						<?php foreach ($types as $type) {
							echo "<option value='".$type['id']."'>".$type['type']."</option>";
						} ?>
					</select>
				</div>
				
				<div class="btncenter">
                <input class="btn-login" type="submit" id="btn-create-person" name="btn-create-person" value="Create">
                <input class="btn-login" type="button" onclick="window.location.href = 'dashboard';" value="Cancel"/>
                </div>
				<div><?php if(isset($error)) { echo $error; } ?></div>
			</form>
		</div>
	</section>
</main>

<?php require 'views/parts/footer.php';?>
