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
        include_once "models/CompanyDetailModel.php";
        require_once "controllers/controller.php";
        echo "<tr><td>Name: </td><td>" .$companyDetailView["name"] ."</td></tr>"
            ."<tr><td>VAT Number: </td><td>" .$companyDetailView["vat"] ."</td></tr>";
    ?>
</table>
    
<h2> Invoices </h2>
<table>
    <?php
        echo "<tr><td>Number</td><td>Date</td></tr>";
        foreach($companyInvoicesView as $companyInvoice) { 
                echo "<tr><td>" .$companyInvoice["number"] ."</td>"
                    ."<td>" .$companyInvoice["date"] ."</td></tr>";
            }
    ?>
</table>

<h2> Contacts </h2>
<table>
    <?php
        echo "<tr><td>First name</td><td>Last name</td><td>Email</td></tr>";
        foreach($companyContactsView as $companyContact) { 
                echo "<tr><td>" .$companyContact["firstname"] ."</td>"
                    ."<td>" .$companyContact["lastname"] ."</td>"
                    ."<td>".$companyContact['email']."</td></tr>";
            }
    ?>
</table>

<br>
<footer> Placeholder Footer </footer>
</body>
</html>