<?php require 'views/parts/header.php'; ?>

<span>
      <?=$displayBtn?>
</span>

<table>
    <caption>Do you want to delete this user ?</caption>
    <thead>
    <tr class='tableHead'>
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
            <td><button class='BtnDelete'><a href="deleteUser&id=<?= $userData['id'] ?>">YES</a></button></td>
            <td><button class='BtnDelete'><a href="users">Cancel</a></button></td>
        </tr>
    </tbody>
</table>

<?php require 'views/parts/footer.php'; ?>
