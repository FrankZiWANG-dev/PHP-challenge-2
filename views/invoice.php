<?php require 'views/parts/header.php';?>

<main class="">
    <section id="">
        <div id="title" class="">
            <h1>Adding invoice</h1>
        </div>
    </section>
    <section class="">
        <div id="add-person-request">
            <form name="frm-add-invoice" id="frm-add-invoice"  action="" method="POST">
                <p class="mandatory">[ <span class="red">*</span> Indicates mandatory fields ]</p>
                <div class="mt-24">
                    <label for="invoice_number">Number</label><span class="red">* </span>
                    <input type="text" class="" id="invoice_number" name="invoice_number" placeholder="number"
                           onkeyup="prependF(this)"
                           value="<?php if(isset($_POST['invoice_number'])){ echo htmlentities($_POST['invoice_number']);}?>"
                    >
                </div>
                <div class="mt-24">
                    <label for="invoice_date">Date</label><span class="red">* </span>
                    <input type="text" class="form-control" id="invoice_date" name="invoice_date" placeholder="date" readonly="true"
                           value="<?php if(isset($_POST['invoice_date'])){ echo $_POST['invoice_date'];}?>"
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
                <div class="mt-24">
                    <label for="person">Person</label><span class="red">* </span>
                    <select name='person'>
                        <?php foreach ($persons as $person) {
                            echo "<option value='".$person['id']."'>".$person['firstname'].' '.$person['lastname']."</option>";
                        } ?>
                    </select>
                </div>


                <input class="mt-24" type="submit" id="btn-create-invoice" name="btn-create-invoice" value="Create">
                <input type="button" onclick="window.location.href = 'dashboard';" value="Cancel"/>

                <div class="error mt-16"><?php if(isset($error)) { echo $error; } ?></div>
            </form>
        </div>
    </section>
</main>

<?php require 'views/parts/footer.php';?>