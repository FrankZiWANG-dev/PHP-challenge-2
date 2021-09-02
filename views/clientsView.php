<?php require 'views/parts/header.php';?>

<h1> Clients </h1>
<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Country</td>
        <td>VAT</td>
    </tr>
    <?php 
        foreach($clientsView as $client) { 
            echo "<tr>"
                ."<td>" .$client["id"] ."</td>"
                ."<td><a href='clientsDetail/" .$client["id"] ."'>" .$client["name"] ."</a></td>"
                ."<td>" .$client["country"] ."</td>"
                ."<td>" .$client["vat"] ."</td></tr>";
        }

    ?>
</table>
<?php require 'views/parts/footer.php';?>
