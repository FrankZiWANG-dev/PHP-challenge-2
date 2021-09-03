<?php require 'views/parts/header.php';?>

<h1> Client contacts </h1>

<?php

include_once "models/ClientsDetailModel.php";
require_once "controllers/controller.php";

for ($x=0, $y=1; $x<sizeof($clientsDetailView); $x++, $y++){
    echo "<h2>Contact n°" .$y ."</h2>";
    echo "<table>";

    echo "<tr><td>First name: </td><td>".$clientsDetailView[$x]["firstname"] ."</td></tr>"
         ."<tr><td>Last name: </td><td>".$clientsDetailView[$x]["lastname"] ."</td></tr>"
         ."<tr><td>Email: </td><td>".$clientsDetailView[$x]["email"] ."</td></tr>"
         ."<tr><td>Invoices (Number/Date): </td><td>"
            ."<table class='clientDetailInvoices'>";
   
    for ($i=0; $i<sizeof($clientsInvoicesView); $i++){
        if ($clientsInvoicesView[$i]["person_id"]==$clientsDetailView[$x]["id"]){
            echo "<tr class='none'><td>" .$clientsInvoicesView[$i]["number"] ."</td>"
                ."<td>" .$clientsInvoicesView[$i]["date"] ."</td></tr>";
        }
        
    }
         
    echo "</table></td></tr></table>";
         
}
?>
<?php require 'views/parts/footer.php';?>
