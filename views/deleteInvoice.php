<?php require 'views/parts/header.php'; ?>

<table>
    <h2>Do you want to delete this invoice ?</h2>
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
        <td><button class='btn-login'><a class ="yc" href="deleteInvoice&id=<?= $invoicesId['id'] ?>">YES</a></button></td>
        <td><button class='btn-login'><a class ="yc" value="Cancel" onclick="window.location.href='invoice'">Cancel</a></button></td>
    </tr>
    </tbody>

</table>