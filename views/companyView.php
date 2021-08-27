<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
</head>
<body>

<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Country</td>
        <td>VAT</td>
        <td>Company type</td>
    </tr>
    <?php 
        
        foreach($companyView as $company) { 
            echo "<tr>"
                ."<td>" .$company["id"] ."</td>"
                ."<td>" .$company["name"] ."</td>"
                ."<td>" .$company["country"] ."</td>"
                ."<td>" .$company["vat"] ."</td>"
                ."<td>" .$company["type_id"] ."</td>"
                ."</tr>";
        }

    ?>
</table>
    
</body>
</html>