<?php require 'views/parts/header.php'; ?>

<span>
      <?=$displayBtn?>
</span>
<span>
      <button type="button" name="users"><a class="nav-link" href="users">Users</a></button>
</span>

<form method="post">
    <label for="username">
        Username : <input type="text" name="username" id="username" value="<?= $userValue['login'] ?? '' ?>">
    </label>
    <label for="email">
        E-mail : <input type="email" name="email" id="email" value="<?= $userValue['email'] ?? '' ?>">
    </label>
    <label for="password">
        Password : <input type="password" name="password" id="password">
    </label>
    <label for="role">
        Role :
        <select name="role" id="role">
            <option <?= $userValue['role'] == 'user' ? 'selected' : '' ?>>user</option>
            <option <?= $userValue['role'] == 'moderator' ? 'selected' : '' ?>>moderator</option>
            <option <?= $userValue['role'] == 'admin' ? 'selected' : '' ?>>admin</option>
        </select>
    </label>
    <input type="submit" name="submit">
</form>
