<?php
	require 'views/parts/header.php';
	require_once 'src/Helpers/Country.php';
	require_once 'src/Helpers/Helper.php';
?>

<main>
	<section>
		<div id="title">
			<h1>Update contact: <?php echo $contact[0]["firstname"] ." " .$contact[0]["lastname"]?></h1>
		</div>
	</section>
	<section>
		<div id="add-person-request">
			<form name="frm-add-person" id="frm-add-person"  action="" method="POST">
				<p>[ <span class="red">*</span> Indicates mandatory fields ]</p>
				<input type="hidden" id="person_id" name="person_id" value="<?= $contact[0]['id'];?>">
				<div class="marginTop">
					<label for="firstname">Firstname</label><span class="red">* </span>
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname"
								 value="<?php
									 if(isset($_POST['firstname'])) { echo htmlentities($_POST['firstname']);}
									 else { echo $contact[0]['firstname']; }
								 ?>"
					>
				</div>
				<div class="marginTop">
					<label for="lastname">Lastname</label><span class="red">* </span>
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname"
								 value="<?php
									 if(isset($_POST['lastname'])){ echo htmlentities($_POST['lastname']);}
									 else { echo $contact[0]['lastname']; }
									 ?>"
					>
				</div>
				<div class="marginTop">
					<label for="email">Email</label><span class="red">* </span>
					<input type="text" class="form-control" id="email" name="email" placeholder="email"
								 value="<?php
									 if(isset($_POST['email'])){ echo htmlentities($_POST['email']);}
									 else { echo $contact[0]['email']; }
									 ?>"
					>
				</div>
				<div class="marginTop">
					<label for="company">Company</label><span class="red">* </span>
					<select name='company'>
						<?php foreach ($companies as $company) { ?>
							<option value="<?= $company['id']; ?>"
                              <?php if ($company['id'] === $contact[0]['company_id']) { echo 'selected="selected"'; }  ?> >
                              <?= $company['name']; ?>
                            </option>
						<?php } ?>
					</select>
				</div>
				
				<?php if($action == "update") { ?>
					<input class="marginTop buttonAdd" type="submit" id="btn-save-person" name="btn-save-contact" value="Save">
				<?php } else { ?>
					<input class="marginTop buttonAdd" type="submit" id="btn-delete-person" name="btn-delete-contact" value="Delete"
								 onclick="if (!confirm('Are you sure?')) { return false }">
				<?php } ?>
				<input class='buttonAdd'type="button" onclick="window.location.href = '../dashboard';" value="Cancel"/>
				
				<div><?php if(isset($error)) { echo $error; } ?></div>
			</form>
		</div>
	</section>
</main>

<?php require 'views/parts/footer.php';?>

