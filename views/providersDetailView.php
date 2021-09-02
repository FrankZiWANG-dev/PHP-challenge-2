<?php require 'views/parts/header.php';?>


<h1> Provider details </h1>
<h2> Provider info </h2>
<table>
    <?php 
        include_once "models/ProvidersDetailModel.php";
        require_once "controllers/controller.php";
        echo "<tr><td>Name: </td><td>" .$providersDetailView["name"] ."</td></tr>"
            ."<tr><td>VAT Number: </td><td>" .$providersDetailView["vat"] ."</td>";
    ?>
</table>
    
<h2> Invoices </h2>
<table>
    <?php
        echo "<tr><td>Number</td><td>Date</td></tr>";
        foreach($providersInvoicesView as $providersInvoice) { 
                echo "<tr><td>" .$providersInvoice["number"] ."</td>"
                    ."<td>" .$providersInvoice["date"] ."</td></tr>";
            }
    ?>
</table>

<h2> Contacts </h2>
<table>
    <?php
        echo "<tr><td>First name</td><td>Last name</td><td>Email</td></tr>";
        foreach($providersContactsView as $providersContact) { 
                echo "<tr><td>" .$providersContact["firstname"] ."</td>"
                    ."<td>" .$providersContact["lastname"] ."</td>"
                    ."<td>".$providersContact['email']."</td></tr>";
            }
    ?>
</table>

<?php require 'views/parts/footer.php';?>
