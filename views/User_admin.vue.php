<?php require 'views/parts/header.php'; ?>

 <h1>List of users</h1>
<table>
   
    <thead>
        <tr class='tableHead'>
            <th>User Name</th>
            <th>E-mail</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($usersData as $user){ ?>
        <tr>
            <td><a href="updateUser&id=<?=$user['id']?>"><?= $user['login']?></a></td>
            <td><?= $user['email']?></td>
            <td><?= $user['role']?></td>
            <?php
            if ($_SESSION['role'] == 'admin') {
                echo
                "<td><a href='updateUser&id={$user['id']}'><i class='fa fa-edit'></i></a></td>" .
                "<td><a href='confirmDelete&id={$user['id']}'><i class='fa fa-trash'></i></a></td>";
            } else if ($_SESSION['role'] == 'moderator'){
                echo
                "<td><a href='updateUser&id={$user['id']}'><i class='fa fa-edit'></i></a></td>";
            }
            ?>
        </tr>
    <?php } ?>
    </tbody>
</table>

<span>
      <?=$displayBtn?>
</span>

<?php require 'views/parts/footer.php'; ?>
