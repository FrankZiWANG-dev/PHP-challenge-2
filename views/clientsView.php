<?php require 'views/parts/header.php';?>

<h1> Clients </h1>
<table>
    <thead class="tableHead">
        <th>Id</th>
        <th>Name</th>
        <th>Country</th>
        <th>VAT</th>
    </thead>
    <tbody>
    <?php 
        foreach($clientsView as $client) { 
            echo "<tr>"
                ."<td>" .$client["id"] ."</td>"
                ."<td><a href='clientsDetail/" .$client["id"] ."'>" .$client["name"] ."</a></td>"
                ."<td>" .$client["country"] ."</td>"
                ."<td>" .$client["vat"] ."</td></tr>";
        }

    ?>
    </tbody>
</table>
<?php require 'views/parts/footer.php';?>
