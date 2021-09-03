<?php require 'views/parts/header.php';?>

<h1>Create a new invoice</h1>

    <main class="addlogin"> 
       
    <section class="addForm login">
        <div>
            <form name="frm-add-invoice" id="frm-add-invoice"  action="" method="POST">
                <p>[ <span class="red">*</span> Indicates mandatory fields ]</p>
                <div class="marginTop">
                    <label for="invoice_number">Number</label><span class="red">* </span>
                    <input type="text" class="" id="invoice_number" name="invoice_number" placeholder="number"
                           onkeyup="prependF(this)"
                           value="<?php if(isset($_POST['invoice_number'])){ echo htmlentities($_POST['invoice_number']);}?>"
                    >
                </div>
                <div class="marginTop">
                    <label for="invoice_date">Date</label><span class="red">* </span>
                    <input type="text" class="form-control" id="invoice_date" name="invoice_date" placeholder="date" readonly="true"
                           value="<?php if(isset($_POST['invoice_date'])){ echo $_POST['invoice_date'];}?>"
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
                <div class="marginTop">
                    <label for="person">Person</label><span class="red">* </span>
                    <select name='person'>
                        <?php foreach ($persons as $person) {
                            echo "<option value='".$person['id']."'>".$person['firstname'].' '.$person['lastname']."</option>";
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