<button>Create new user</button>
<button>Create new user</button>
<button>Create new user</button>
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