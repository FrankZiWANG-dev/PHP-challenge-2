<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Providers</title>
</head>
<body>

<nav> Placeholder Nav</nav>
<br>

<h1> Providers </h1>
<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Country</td>
        <td>VAT</td>
    </tr>
    <?php 
        include_once "models/ProvidersModel.php";
        require_once "controllers/controller.php";
        foreach($providersView as $provider) { 
            echo "<tr>"
                ."<td><a href='providersDetail/" .$provider["id"]."'>" .$provider["id"] ."</a></td>"
                ."<td>" .$provider["name"] ."</td>"
                ."<td>" .$provider["country"] ."</td>"
                ."<td>" .$provider["vat"] ."</td>"
                ."</td></tr>";
        }

    ?>
</table>
    
<br>
<footer> Placeholder Footer </footer>
</body>
</html>