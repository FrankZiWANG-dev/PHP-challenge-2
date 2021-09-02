<?php require 'views/parts/header.php'; ?>

<table>
    <caption>Do you want to delete this invoice ?</caption>
    <thead>
    <tr>
        <th>Invoice number</th>
        <th>Invoice Date</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $invoicesId['number']?></a></td>
        <td><?= $invoicesId['date']?></td>
        <td><button><a href="deleteInvoice&id=<?= $invoicesId['id'] ?>">YES</a></button></td>
        <td><input type="button" value="Cancel" onclick="window.location.href='invoice'"></td>
    </tr>
    </tbody>

</table>