<?php require 'views/parts/header.php'; ?>

<h1> Person detail</h1>

<table>

<?php

include_once "models/PeopleDetailModel.php";
require_once "controllers/controller.php";

echo "<tr><td>Id: </td><td>" .$peopleDetailView['id'] ."</td></tr>"
    ."<tr><td>First name: </td><td>" .$peopleDetailView['firstname'] ."</td></tr>"
    ."<tr><td>Last name: </td><td>" .$peopleDetailView['lastname'] ."</td></tr>"
    ."<tr><td>Email: </td><td>" .$peopleDetailView['email'] ."</td></tr>"
    ."<tr><td>Company: </td><td>" .$peopleDetailView['name'] ."</td></tr>"
    ."<tr><td>Invoices: </td><td>"
    ."<table><tr><td>Number </td><td>Date </td></tr>";
    
foreach($peopleInvoicesView as $peopleInvoice) { 
    echo "<tr><td>" .$peopleInvoice["number"] ."</td>"
        ."<td>" .$peopleInvoice["date"] ."</td></tr>";
}

echo "</table></td></tr>";

?>

</table>
<?php require 'views/parts/footer.php'; ?>
