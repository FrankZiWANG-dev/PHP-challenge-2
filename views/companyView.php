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

<h1> Companies </h1>
<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Country</td>
        <td>VAT</td>
        <td>Company type</td>
    </tr>
    <?php 
        include_once "models/CompanyModel.php";
        require_once "controllers/controller.php";
        foreach($companyView as $company) { 
            echo "<tr>"
                ."<td><a href='companyDetail/" .$company["id"] ."'>" .$company["id"] ."</a></td>"
                ."<td>" .$company["name"] ."</td>"
                ."<td>" .$company["country"] ."</td>"
                ."<td>" .$company["vat"] ."</td>"
                ."<td>";
            if ($company["type_id"] == 1){
                echo "Client";
            }
            else {
                echo "Provider";
            }
            echo "</td></tr>";
        }

    ?>
</table>
    
<br>
<footer> Placeholder Footer </footer>
</body>
</html>