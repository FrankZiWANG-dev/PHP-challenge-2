<?php require 'views/parts/header.php';?>

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
                ."<td>" .$provider["id"] ."</td>"
                ."<td><a href='providersDetail/" .$provider["id"]."'>" .$provider["name"] ."</a></td>"
                ."<td>" .$provider["country"] ."</td>"
                ."<td>" .$provider["vat"] ."</td>"
                ."</td></tr>";
        }

    ?>
</table>
<?php require 'views/parts/footer.php';?>
