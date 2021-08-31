<?php
	require_once 'src/Config/Database.php';

	class User
	{
        private Database $db;
        private $pdo;

        public function __construct() {
            $this->db = new Database();
            $this->pdo = $this->db->connect();
        }

        private function sanitize($postToSanitize, $type = 'string' || 'email'){
            if ($type === 'string') {
                return filter_var(trim($postToSanitize), FILTER_SANITIZE_STRING);
            } else {
                return filter_var(trim($postToSanitize), FILTER_SANITIZE_EMAIL);
            }
        }

        private function sessionSet($login, $role){
            $_SESSION['username'] = $login;
            $_SESSION['role'] = $role;
        }

        public function login($username, $password)
        {
            $username = $this->sanitize($username, 'string');

            $log = $this->pdo->prepare("SELECT * FROM user WHERE login = ?");
            $log->execute([$username]);
            $userExist = $log->fetch();

            if ($userExist) {
                if ($userExist['login'] === $username && password_verify($password, $userExist["password"])) {
                    $this->sessionSet($userExist['login'], $userExist['role']);
                    header ('location: /dashboard');
                }else {
                    header ('location: /login');
                }
            }else {
                header ('location: /login');
            }
		}

		public function displayUsers(): bool|array
        {
            $log = $this->pdo->prepare("SELECT * FROM user");
            $log->execute();
            return $log->fetchAll();
        }

        public function newUser()
        {
            $is_set =
                isset($_POST['username']) &&
                isset($_POST['email']) &&
                isset($_POST['password']) &&
                isset($_POST['role']);

            $is_not_empty =
                !empty($_POST['username']) &&
                !empty($_POST['email']) &&
                !empty($_POST['password']) &&
                !empty($_POST['role']);

            if ($is_set && $is_not_empty){
                $username = $this->sanitize($_POST['username'], 'string');
                $role = $this->sanitize($_POST['role'], 'string');
                $email = $this->sanitize($_POST['email'], 'email');

                $user = $this->pdo->prepare("SELECT * FROM user WHERE login = ?");
                $user->execute([$username]);
                $newUserVerif = $user->fetch();

                if (!$newUserVerif){
                    $newUser = $this->pdo->prepare("INSERT INTO user (login, password, email, role) VALUES (?, ?, ?, ?)");
                    $newUser->execute([$username, password_hash($_POST['password'], PASSWORD_BCRYPT),$email, $role]);
                    header ('location: /users');
                }
            }
        }

        public function deleteUser()
        {
            if ($_GET['id']){
                $id = $_GET['id'];
                $newUser = $this->pdo->prepare("DELETE FROM user WHERE id = ?");
                $newUser->execute([$id]);
            }
            header ('location: /users');
        }

        public function selectById()
        {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $log = $this->pdo->prepare("SELECT * FROM user WHERE id = ?");
                $log->execute([$id]);
                return $log->fetch();
            }
            header ('location: /users');
        }

        public function updateUser()
        {
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $login = $this->sanitize($_POST['username'], 'string');
                $password = $_POST['password'];
                $email = $this->sanitize($_POST['email'], 'email');
                $role = $this->sanitize($_POST['role'], 'string');
                if (!empty($_POST['password'])){
                    $newUser = $this->pdo->prepare("UPDATE user SET login = ?, password = ?, email = ?, role = ? WHERE id = ?");
                    $newUser->execute([$login, password_hash($password, PASSWORD_BCRYPT), $email, $role, $id]);
                } else {
                    $newUser = $this->pdo->prepare("UPDATE user SET login = ?, email = ?, role = ? WHERE id = ?");
                    $newUser->execute([$login, $email, $role, $id]);
                }
                header ('location: /users');
            }
            header ('location: /users');
        }
    }