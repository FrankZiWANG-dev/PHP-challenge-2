<?php
//require_once '../src/Auth/User.php';
try {
    $db = new Database();
    $pdo = $db->connect();
    $users = new User();
    $users->displayUsers($pdo);

} catch (Exception $e) {
    $error = $e->getMessage();
}


?>

<span>
      <button <?=$create?> type="button" name="addInvoice"><a href="?page=admin&action=add_invoice">Add invoice</a></button>
      <button <?=$create?> type="button" name="addCompany"><a href="?page=admin&action=add_company">Add company</a></button>
      <button <?=$create?> type="button" name="addPerson"><a href="?page=admin&action=add_person">Add person</a></button>
    </span>
    <span>
      <button type="button" name="client"><a class="nav-link" href="?page=client">Client</a></button>
      <button type="button" name="provider"><a class="nav-link" href="?page=provider">Provider</a></button>
      <button type="button" name="users"><a class="nav-link" href="users">Users</a></button>
    </span>

<button>Create new user</button>

<form method="post">
    <label for="username">
        Username : <input type="text" name="username" id="username">
    </label>
    <label for="email">
        E-mail : <input type="email" name="email" id="email">
    </label>
    <label for="password">
        Password : <input type="password" name="password" id="password">
    </label>
    <label for="role">
        Role :
        <select name="role" id="role">
            <option>Admin</option>
            <option>Moderator</option>
            <option>User</option>
        </select>
    </label>
    <input type="submit" name="submit">
</form>

<table>
    <caption>List of users</caption>
    <thead>
        <tr>
            <th>User Name</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user){ ?>
        <tr>
            <td><a href="user_detail&id=<?=$user['id']?>"><?= $user['name']?></a></td>
            <td><?= $user['country']?></td>
            <td><?= $user['vat']?></td>
            <td <?=$edit_delete?>><a href="admin&action=update_company&id=<?=$user['id']?>"><i class="fa fa-edit"></i></a></td>
            <td <?=$edit_delete?>><a href="admin&admin=delete_company&id=<?=$user['id']?>"><i class="fa fa-trash"></i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>