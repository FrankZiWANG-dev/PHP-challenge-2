<?php
	require_once 'views/parts/header.php';
	require_once 'src/Helpers/Country.php';
	require_once 'src/Helpers/Helper.php';
?>

<main>
	<section>
		<div id="title">
			<h1>Update company: <?php echo $company[0]['name']?></h1>
		</div>
	</section>
	<section class="addForm">
		<div id="add-person-request">
			<form name="frm-add-company" id="frm-add-company"  action="" method="POST">
				<p>[ <span class="red">*</span> Indicates mandatory fields ]</p>
                <input type="hidden" id="company_id" name="company_id" value="<?= $company[0]['id'];?>">
				<div class="marginTop">
					<label for="name">Name</label><span class="red">* </span>
					<input type="text" id="name" name="name" placeholder="company name"
                         value="<?php
                                   if(isset($_POST['name'])) { echo htmlentities($_POST['name']);}
                                   else { echo $company[0]['name']; }
                                ?>"
					>
				</div>
				<div class="marginTop">
					<label for="country">Country</label><span class="red">* </span>
					<select name="country" id="country">
						<?php foreach ($countries as $k => $v) { ?>
							<option value="<?= $v; ?>"
                              <?php if ($v === $company[0]['country']) { echo 'selected="selected"'; }  ?> >
                              <?= $v; ?>
                            </option>
						<?php } ?>
					</select>
				</div>
				<div class="marginTop">
					<label for="vat">Vat</label><span class="red">* </span>
					<input type="text" class="form-control" id="vat" name="vat" placeholder="vat"
								 value="<?php if(isset($_POST['vat'])){ echo $_POST['vat'];} else { echo $company[0]['vat'];} ?>"
					>
				</div>
				<div class="marginTop">
					<label for="type">Type</label><span class="red">* </span>
					<select class="" name='type' id="type">
						<?php foreach ($types as $type) { ?>
						    <option value="<?= $type['id']; ?>"
                              <?php if ($type['id'] === $company[0]['type_id']) { echo 'selected="selected"'; } ?> >
                              <?= $type['type']; ?></option>
						<?php } ?>
					</select>
				</div>
				
				
				<?php if($action == "update") { ?>
                    <input class="marginTop" type="submit" id="btn-save-company" name="btn-save-company" value="Save">
                <?php } else { ?>
                    <input class="marginTop" type="submit" id="btn-delete-company" name="btn-delete-company" value="Delete"
                           onclick="if (!confirm('Are you sure?')) { return false }">
                <?php } ?>
				<input style="buttonAdd" type="button" onclick="window.location.href = '../dashboard';" value="Cancel"/>
				
				<div><?php if(isset($error)) { echo $error; } ?></div>
			</form>
		</div>
	</section>
</main>

<?php require 'views/parts/footer.php';?>

