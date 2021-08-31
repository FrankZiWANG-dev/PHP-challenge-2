<?php require 'views/parts/header.php';?>

<main class="">
    <section id="">
        <div id="title" class="">
            <h1>Adding person</h1>
        </div>
    </section>
    <section class="">
        <div id="add-person-request">
            <form name="frm-add-person" id="frm-add-person"  action="" method="POST">
                <p class="mandatory">[ <span class="red">*</span> Indicates mandatory fields ]</p>
                <div class="mt-24">
                    <label for="firstname">Firstname</label><span class="red">* </span>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname"
                           value="<?php if(isset($_POST['firstname'])){ echo htmlentities($_POST['firstname']);}?>"
                    >
                </div>
                <div class="mt-24">
                    <label for="lastname">Lastname</label><span class="red">* </span>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname"
                           value="<?php if(isset($_POST['lastname'])){ echo htmlentities($_POST['lastname']);}?>"
                    >
                </div>
                <div class="mt-24">
                    <label for="email">Email</label><span class="red">* </span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email"
                           value="<?php if(isset($_POST['email'])){ echo htmlentities($_POST['email']);}?>"
                    >
                </div>
                <div class="mt-24">
                    <label for="company">Company</label><span class="red">* </span>
                    <select name='company'>
                        <?php foreach ($companies as $company) {
                            echo "<option value='".$company['id']."'>".$company['name']."</option>";
                        } ?>
                    </select>
                </div>
                

                <input class="mt-24" type="submit" id="btn-create-person" name="btn-create-person" value="Create">
                <input type="button" onclick="window.location.href = 'dashboard';" value="Cancel"/>

                <div class="error mt-16"><?php if(isset($error)) { echo $error; } ?></div>
            </form>
        </div>
    </section>
</main>
<?php echo '<br/>'; ?>
<?php require 'views/parts/footer.php';?>
