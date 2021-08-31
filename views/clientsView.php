<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
</head>
<body>

<nav> Placeholder Nav</nav>
<br>

<h1> Clients </h1>
<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Country</td>
        <td>VAT</td>
    </tr>
    <?php 
        include_once "models/ClientsModel.php";
        require_once "controllers/controller.php";
        foreach($clientsView as $client) { 
            echo "<tr>"
                ."<td>" .$client["id"] ."</td>"
                ."<td><a href='clientsDetail'>" .$client["name"] ."</a></td>"
                ."<td>" .$client["country"] ."</td>"
                ."<td>" .$client["vat"] ."</td></tr>";
        }

    ?>
</table>
    
<br>
<footer> Placeholder Footer </footer>
</body>
</html>