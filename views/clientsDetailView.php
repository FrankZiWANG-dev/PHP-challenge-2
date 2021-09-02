<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client detail</title>
</head>
<body>

<nav> Placeholder Nav</nav>
<br>

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
         ."<tr><td>Invoices: </td><td>"
            ."<table><tr><td>Number</td><td>Date</td></tr>";
   
    for ($i=0; $i<sizeof($clientsInvoicesView); $i++){
        if ($clientsInvoicesView[$i]["person_id"]==$clientsDetailView[$x]["id"]){
            echo "<tr><td>" .$clientsInvoicesView[$i]["number"] ."</td>"
                ."<td>" .$clientsInvoicesView[$i]["date"] ."</td></tr>";
        }
        
    }
         
    echo "</table></td></tr></table>";
         
}
?>


<br>
<footer> Placeholder Footer </footer>
</body>
</html>