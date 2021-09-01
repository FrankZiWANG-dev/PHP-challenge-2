<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People</title>
</head>
<body>

<nav> Placeholder Nav</nav>
<br>

<h1> People </h1>
<table>
    <tr>
        <td>Id</td>
        <td>First name</td>
        <td>Last name</td>
        <td>Email</td>
        <td>Company</td>
    </tr>
    <?php 
        include_once "models/PeopleModel.php";
        require_once "controllers/controller.php";
        foreach($peopleView as $person) { 
            echo "<tr>"
                ."<td><a href='peopleDetail/" .$person["id"] ."'>" .$person["id"] ."</a></td>"
                ."<td>" .$person["firstname"] ."</td>"
                ."<td>" .$person["lastname"] ."</td>"
                ."<td>" .$person["email"] ."</td>"
                ."<td>" .$person["name"] ."</td>"
                ."</tr>";
        }

    ?>
</table>
    
<br>
<footer> Placeholder Footer </footer>
</body>
</html>