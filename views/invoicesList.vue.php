<?php require_once 'views/parts/header.php'; ?>

<span>
      <?=$displayBtn?>
</span>

<table>
    <caption>List of users</caption>
    <thead>
    <tr>
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
                    "<td><a href='deleteUser&id={$user['id']}'><i class='fa fa-trash'></i></a></td>";
            }
            ?>
        </tr>
    <?php } ?>
    </tbody>
</table>