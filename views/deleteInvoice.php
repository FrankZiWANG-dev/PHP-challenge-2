<?php require 'views/parts/header.php'; ?>

<table>
    <caption>Do you want to delete this invoice ?</caption>
    <thead>
    <tr class='tableHead'>
        <th>Invoice number</th>
        <th>Invoice Date</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $invoicesId['number']?></a></td>
        <td><?= $invoicesId['date']?></td>
        <td><button class='BtnDelete'><a href="deleteInvoice&id=<?= $invoicesId['id'] ?>">YES</a></button></td>
        <td><input class='BtnDelete' type="button" value="Cancel" onclick="window.location.href='invoice'"></td>
    </tr>
    </tbody>

</table>