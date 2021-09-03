<?php require 'views/parts/header.php'; ?>

<h1> Update user </h1>
<main class="addlogin">
    
    <section class="addForm login">
        <form method="post">
            <div class="marginTop">
                <label for="username">
                    Username : <input type="text" name="username" id="username" value="<?= $userValue['login'] ?? '' ?>">
                </label>
            </div>
            <div class="marginTop">
                <label for="email">
                    E-mail : <input type="email" name="email" id="email" value="<?= $userValue['email'] ?? '' ?>">
                </label>
            </div>
            <div class="marginTop">
                <label for="password">
                    Password : <input type="password" name="password" id="password">
                </label>
            </div>
            <div class="marginTop">
                <label for="role">
                    Role :
                    <select name="role" id="role">
                        <option <?= $userValue['role'] == 'user' ? 'selected' : '' ?>>user</option>
                        <option <?= $userValue['role'] == 'moderator' ? 'selected' : '' ?>>moderator</option>
                        <option <?= $userValue['role'] == 'admin' ? 'selected' : '' ?>>admin</option>
                    </select>
                </label>
            </div>
            <div class="btncenter">
                <input class="btn-login" type="submit" id="btn-create-person" name="btn-create-person" value="Create">
                <input class="btn-login" type="button" onclick="window.location.href = 'users';" value="Cancel"/>
                </div>
        </form>
    </section>
</main>
<?php require 'views/parts/footer.php'; ?>
