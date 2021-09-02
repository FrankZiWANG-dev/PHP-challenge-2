<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
</head>
<body>

<nav> Placeholder Nav</nav>
<br>

<h1> Company details </h1>
<h2> Company </h2>
<table>
    <?php 
        echo "<tr><td>Name: </td><td>" .$companyDetailView[0]["name"] ."</td></tr>"
            ."<tr><td>VAT Number: </td><td>" .$companyDetailView[0]["vat"] ."</td></tr>";
    ?>
</table>
    
<h2> Invoices </h2>
<table>
    <?php
        echo "<tr><td>Number</td><td>Date</td></tr>";
        for ($i=0;$i<sizeof($companyInvoicesView);$i++) { 
                echo "<tr><td>" .$companyInvoicesView[$i]["number"] ."</td>"
                    ."<td>" .$companyInvoicesView[$i]["date"] ."</td></tr>";
            }
    ?>
</table>

<h2> Contacts </h2>
<table>
    <?php
        echo "<tr><td>First name</td><td>Last name</td><td>Email</td></tr>";
        for ($i=0; $i<sizeof($companyContactsView); $i++) { 
                echo "<tr><td>" .$companyContactsView[$i]["firstname"] ."</td>"
                    ."<td>" .$companyContactsView[$i]["lastname"] ."</td>"
                    ."<td>".$companyContactsView[$i]['email']."</td></tr>";
            }
    ?>
</table>

<br>
<footer> Placeholder Footer </footer>
</body>
</html>