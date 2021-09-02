<?php require 'views/parts/header.php'; ?>

<main>
    <section>
            <h1> Update user </h1>
    </section>
    <section class="addForm">
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
            <input class="buttonAdd marginTop" type="submit" name="submit">
            <button class="buttonAdd marginTop"><a href="users">Cancel</a></button>
        </form>
    </section>
<?php require 'views/parts/footer.php'; ?>

</main>