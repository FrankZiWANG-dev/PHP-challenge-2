<?php require 'views/parts/header.php'; ?>


<h1> Company details </h1>
<h2> Company </h2>
<table>
    <?php 
        echo "<tr><td class='tableHead'>Name: </td><td>" .$companyDetailView[0]["name"] ."</td></tr>"
            ."<tr><td class='tableHead'>VAT Number: </td><td>" .$companyDetailView[0]["vat"] ."</td></tr>";
    ?>
</table>
    
<h2> Invoices </h2>
<table>
    <?php
        echo "<tr class='tableHead'><td>Number</td><td>Date</td></tr>";
        for ($i=0;$i<sizeof($companyInvoicesView);$i++) { 
                echo "<tr><td>" .$companyInvoicesView[$i]["number"] ."</td>"
                    ."<td>" .$companyInvoicesView[$i]["date"] ."</td></tr>";
            }
    ?>
</table>

<h2> Contacts </h2>
<table>
    <?php
        echo "<tr class='tableHead'><td>First name</td><td>Last name</td><td>Email</td></tr>";
        for ($i=0; $i<sizeof($companyContactsView); $i++) { 
                echo "<tr><td>" .$companyContactsView[$i]["firstname"] ."</td>"
                    ."<td>" .$companyContactsView[$i]["lastname"] ."</td>"
                    ."<td>".$companyContactsView[$i]['email']."</td></tr>";
            }
    ?>
</table>

<?php require 'views/parts/footer.php'; ?>
