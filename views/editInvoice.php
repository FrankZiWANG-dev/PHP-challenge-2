<?php require 'views/parts/header.php'; ?>

<h1> Update invoice </h1>
<main class="addlogin">
   
    <section class="addForm login">
        <form method="post">
            <div class="marginTop">
                <label for="number">
                    Invoice number : <input type="text" name="number" id="number" value="<?= $invoicesId['number'] ?? '' ?>">
                </label>
            </div>
            <div class="marginTop">
                <label for="date">
                    Date : <input type="date" name="date" id="date" value="<?= $invoicesId['date'] ?? '' ?>">
                </label>
            </div>
            <div class="marginTop">
                <label for="company">
                    Company :
                    <select name="company" id="company">
                        <?php
                            foreach ($companyList as $company){ ?>
                                <option <?= $invoicesId['company_id'] == $company['id'] ? 'selected' : '' ?> value="<?= $company['id'] ?>"> <?= $company['name'] ?></option>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <div class="btncenter">
                <input class="btn-login" type="submit" id="btn-create-person" name="btn-create-person" value="Create">
                <input class="btn-login" type="button" onclick="window.location.href = 'dashboard';" value="Cancel"/>
                </div>
        </form>
    </section>
</main>
<?php require 'views/parts/footer.php'; ?>