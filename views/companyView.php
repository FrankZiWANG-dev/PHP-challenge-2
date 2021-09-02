<?php require 'views/parts/header.php'; ?>

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
                ."<td>" .$company["id"] ."</td>"
                ."<td><a href='companyDetail/" .$company["id"] ."'>" .$company["name"] ."</a></td>"
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
<?php require 'views/parts/footer.php'; ?>
