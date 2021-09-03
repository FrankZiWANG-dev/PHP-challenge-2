<?php require 'views/parts/header.php';?>

<h1>Create a new contact</h1>

<main class="addlogin" >
    
    <section class="addForm login">
        <div id="add-person-request">
            <form name="frm-add-person" id="frm-add-person"  action="" method="POST">
                <p>[ <span class="red">*</span> Indicates mandatory fields ]</p>
                <div class="marginTop">
                    <label for="firstname">Firstname</label><span class="red">* </span>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname"
                           value="<?php if(isset($_POST['firstname'])){ echo htmlentities($_POST['firstname']);}?>"
                    >
                </div>
                <div class="marginTop">
                    <label for="lastname">Lastname</label><span class="red">* </span>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname"
                           value="<?php if(isset($_POST['lastname'])){ echo htmlentities($_POST['lastname']);}?>"
                    >
                </div>
                <div class="marginTop">
                    <label for="email">Email</label><span class="red">* </span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email"
                           value="<?php if(isset($_POST['email'])){ echo htmlentities($_POST['email']);}?>"
                    >
                </div>
                <div class="marginTop">
                    <label for="company">Company</label><span class="red">* </span>
                    <select name='company'>
                        <?php foreach ($companies as $company) {
                            echo "<option value='".$company['id']."'>".$company['name']."</option>";
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
