<?php require 'views/parts/header.php'; ?>
<main>
    <section>
            <h1> Update invoice </h1>
    </section>
    <section class="addForm">
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
            <input class ="buttonAdd marginTop" type="submit" name="submit">
            <input class ="buttonAdd marginTop" type="button" value="Cancel" onclick="window.location.href='invoice'">
        </form>
    </section>
    <?php require 'views/parts/footer.php'; ?>
</main>