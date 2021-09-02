<?php require 'views/parts/header.php'; ?>

<form method="post">
    <label for="number">
        Invoice number : <input type="text" name="number" id="number" value="<?= $invoicesId['number'] ?? '' ?>">
    </label>
    <label for="date">
        Date : <input type="date" name="date" id="date" value="<?= $invoicesId['date'] ?? '' ?>">
    </label>
    <label for="company">
        Company :
        <select name="company" id="company">
            <?php
                foreach ($companyList as $company){ ?>
                    <option <?= $invoicesId['company_id'] == $company['id'] ? 'selected' : '' ?> value="<?= $company['id'] ?>"> <?= $company['name'] ?></option>
            <?php } ?>
        </select>
    </label>
    <input type="submit" name="submit">
    <input type="button" value="Cancel" onclick="window.location.href='invoice'">
</form>
