<?php require_once 'views/parts/header.php'; ?>

<table>
    <caption>List of invoices</caption>
    <thead>
    <tr>
        <th>Invoice number</th>
        <th>Invoice Date</th>
        <th>Company name</th>
        <th>Company type</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($invoicesList as $invoice){ ?>
        <tr>
            <td><a href="editInvoice&id=<?=$invoice['invoice_id']?>"><?= $invoice['invoice_number']?></a></td>
            <td><?= $invoice['invoice_date']?></td>
            <td><?= $invoice['company_name']?></td>
            <td><?= $invoice['company_type']?></td>
            <?php
            if ($_SESSION['role'] == 'admin') {
                echo
                    "<td><a href='editInvoice&id={$invoice['invoice_id']}'><i class='fa fa-edit'></i></a></td>" .
                    "<td><a href='confirmDeleteInvoice&id={$invoice['invoice_id']}'><i class='fa fa-trash'></i></a></td>";
            }
            ?>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php require_once 'views/parts/footer.php'; ?>
