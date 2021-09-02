<?php require 'views/parts/header.php'; ?>
<main>
    <section>
            <h1> Add new user</h1>
    </section>
    <section class="addForm">
        <form method="post">
            <div class="marginTop">
                <label for="username">
                    Username : <input type="text" name="username" id="username">
                </label>
            </div>
            <div class="marginTop">
                <label for="email">
                    E-mail : <input type="email" name="email" id="email">
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
                        <option>user</option>
                        <option>moderator</option>
                        <option>admin</option>
                    </select>
                </label>
            </div>
            <input class="buttonAdd marginTop" type="submit" name="submit">
        </form>
    </section>
</main>