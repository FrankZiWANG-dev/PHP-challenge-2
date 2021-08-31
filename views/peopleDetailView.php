<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person detail</title>
</head>
<body>

<nav> Placeholder Nav</nav>
<br>

<h1> Person detail</h1>

<table>

<?php

include_once "models/PeopleDetailModel.php";
require_once "controllers/controller.php";

echo "<tr><td>Id: </td><td><a href='peopleDetail'>" .$peopleDetailView['id'] ."</a></td></tr>"
    ."<tr><td>First name: </td><td>" .$peopleDetailView['firstname'] ."</td></tr>"
    ."<tr><td>Last name: </td><td>" .$peopleDetailView['lastname'] ."</td></tr>"
    ."<tr><td>Email: </td><td>" .$peopleDetailView['email'] ."</td></tr>"
    ."<tr><td>Company: </td><td>" .$peopleDetailView['company_id'] ."</td></tr>"
    ."<tr><td>Invoices: </td><td>"
    ."<table><tr><td>Number </td><td>Date </td></tr>";
    
foreach($peopleInvoicesView as $peopleInvoice) { 
    echo "<tr><td>" .$peopleInvoice["number"] ."</td>"
        ."<td>" .$peopleInvoice["date"] ."</td></tr>";
}

echo "</table></td></tr>";

?>

</table>

<br>
<footer> Placeholder Footer </footer>
</body>
</html>