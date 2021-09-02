<?php require 'views/parts/header.php'; ?>

<h1> People </h1>
<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Email</td>
        <td>Company</td>
    </tr>
    <?php 
        include_once "models/PeopleModel.php";
        require_once "controllers/controller.php";
        foreach($peopleView as $person) { 
            echo "<tr>"
                ."<td>" .$person["id"] ."</td>"
                ."<td><a href='peopleDetail/" .$person["id"] ."'>" .$person["firstname"] .' '.$person["lastname"] ."</a>"."</td>"
                ."<td>" .$person["email"] ."</td>"
                ."<td>" .$person["name"] ."</td>"
                ."</tr>";
        }

    ?>
</table>
<?php require 'views/parts/footer.php'; ?>
