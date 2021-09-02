<?php require 'views/parts/header.php'; ?>

<h1> Contact detail</h1>

<table>

<?php

include_once "models/PeopleDetailModel.php";
require_once "controllers/controller.php";

echo "<tr><td class='tableHead'>Id: </td><td>" .$peopleDetailView['id'] ."</td></tr>"
    ."<tr><td class='tableHead'>First name: </td><td>" .$peopleDetailView['firstname'] ."</td></tr>"
    ."<tr><td class='tableHead'>Last name: </td><td>" .$peopleDetailView['lastname'] ."</td></tr>"
    ."<tr><td class='tableHead'>Email: </td><td>" .$peopleDetailView['email'] ."</td></tr>"
    ."<tr><td class='tableHead'>Company: </td><td>" .$peopleDetailView['name'] ."</td></tr>"
    ."<tr><td class='tableHead'>Invoices (Number / Date): </td><td>"
    ."<table>";
    
foreach($peopleInvoicesView as $peopleInvoice) { 
    echo "<tr><td>" .$peopleInvoice["number"] ."</td>"
        ."<td>" .$peopleInvoice["date"] ."</td></tr>";
}

echo "</table></td></tr>";

?>

</table>
<?php require 'views/parts/footer.php'; ?>
