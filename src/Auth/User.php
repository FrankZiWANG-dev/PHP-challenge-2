<?php
	require_once 'src/Config/Database.php';

	class User
	{
	    private $login;
	    private $password;
	    private $email;
	    private $role;

        public function getLogin()
        {
            return $this->login;
        }

        public function setLogin($login): void
        {
            $this->login = $login;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password): void
        {
            $this->password = $password;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email): void
        {
            $this->email = $email;
        }

        public function getRole()
        {
            return $this->role;
        }

        public function setRole($role): void
        {
            $this->role = $role;
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

        public function login($username, $password, $pdo)
        {
            //global $pdo;
            $username = $this->sanitize($username, 'string');


            $log = $pdo->prepare("SELECT * FROM user WHERE login = ?");
            $log->execute([$username]);
            $userExist = $log->fetch();

            if ($userExist) {
                if ($userExist['login'] === $username && password_verify($password, $userExist["password"])) {
                    $this->sessionSet($userExist['login'], $userExist['role']);
                    header ('location: /?page=dashboard');
                }
            }
		}

        public function register(array $form_vars = array())
        {
            // TODO: Implement register() method.
        }

        public function logout()
        {
            // TODO: Implement logout() method.
        }

        public function profile()
        {
            // TODO: Implement profile() method.
        }

        public function remove()
        {
            // TODO: Implement remove() method.
        }

        public function getUser()
        {
            // TODO: Implement getUser() method.
        }
    }