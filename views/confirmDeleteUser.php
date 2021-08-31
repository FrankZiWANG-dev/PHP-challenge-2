<?php require 'views/parts/header.php'; ?>

<span>
      <?=$displayBtn?>
</span>

<table>
    <caption>Do you want to delete this user ?</caption>
    <thead>
    <tr>
        <th>User Name</th>
        <th>E-mail</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $userData['login']?></a></td>
            <td><?= $userData['email']?></td>
            <td><?= $userData['role']?></td>
            <td><button><a href="deleteUser&id=<?= $userData['id'] ?>">YES</a></button></td>
        </tr>
    </tbody>
</table>