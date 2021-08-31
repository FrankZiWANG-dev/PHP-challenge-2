<?php
	require_once 'models/models.php';
	//require_once 'views/views.php';
	
	class Controller
    {
        protected object $model;

    public function dashboard()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("location: login");
            exit();
        }
        $this->model = new DashboardModel();
        $invoices = $this->model->getLastFiveInvoices();
        $companies = $this->model->getLastFiveCompanies();
        $persons = $this->model->getLastFivePersons();


        if ($_SESSION['role'] == 'admin') {
            $edit_delete = "";
            $create = "";
        } else if ($_SESSION['role'] == 'moderator') {
            $edit_delete = "class='invisible'";
            $create = "";
        } else {
            $edit_delete = "class='invisible'";
            $create = "class='invisible'";
        }
        echo("Hi " . $_SESSION['username'] . "\n");
        include_once "views/dashboard.php";
    }

    public function login()
    {
        include_once "views/login.php";
    }

    public function logout()
    {
        include_once "src/Auth/logout.php";
    }

    // ........ ADMIN ....... //
    public function addPerson()
    {
        $this->model = new PersonModel();
    }

    public function users()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("location: login");
            exit();
        }
        require_once 'models/User.php';

        $users = new User();
        $usersData = $users->displayUsers();

        if ($_SESSION['role'] == 'admin') {
            $displayBtn = '<button><a href="newUser">Create new user</a></button>';

        } else if ($_SESSION['role'] == 'moderator') {
            $edit_delete = "class='invisible'";
            $displayBtn = "";
        } else {
            $edit_delete = "class='invisible'";
            $displayBtn = "";
        }
        echo("Hi " . $_SESSION['username'] . "\n");
        include_once "views/User_admin.vue.php";
    }

    public function newUser()
    {
        session_start();
        if (!($_SESSION['role'] === 'admin')) {
            header("location: dashboard");
            exit();
        }
        require_once 'models/User.php';

        $users = new User();
        $users->newUser();


        if ($_SESSION['role'] == 'admin') {
            $edit_delete = "";
            $displayBtn = '<button><a href="newUser">Create new user</a></button>';

        } else if ($_SESSION['role'] == 'moderator') {
            $edit_delete = "class='invisible'";
            $displayBtn = "";
        } else {
            $edit_delete = "class='invisible'";
            $displayBtn = "class='invisible'";
        }
        echo("Hi " . $_SESSION['username'] . "\n");
        include_once "views/newUser.php";
    }

    public function deleteUser()
    {
        session_start();
        if (!($_SESSION['role'] === 'admin')) {
            header("location: dashboard");
            exit();
        }
        require_once 'models/User.php';

        $users = new User();
        $users->deleteUser();

    }

    public function updateUser()
    {
        session_start();
        if (!($_SESSION['role'] === 'admin')) {
            header("location: dashboard");
            exit();
        }
        require_once 'models/User.php';

        $user = new User();
        $userValue = $user->selectById();

        if ($_SESSION['role'] == 'admin') {
            $edit_delete = "";
            $displayBtn = '<button><a href="newUser">Create new user</a></button>';

        } else if ($_SESSION['role'] == 'moderator') {
            $edit_delete = "class='invisible'";
            $displayBtn = "";
        } else {
            $edit_delete = "class='invisible'";
            $displayBtn = "class='invisible'";
        }
        echo("Hi " . $_SESSION['username'] . "\n");

        $is_set =
            isset($_POST['username']) &&
            isset($_POST['email']) &&
            isset($_POST['role']);

        $is_not_empty =
            !empty($_POST['username']) &&
            !empty($_POST['email']) &&
            !empty($_POST['role']);

        if ($is_set && $is_not_empty) {
            $userUpdate = $user->updateUser();
        }

        include_once "views/updateUser.php";
    }

        public function invoicesList()
        {
            session_start();
            if (!isset($_SESSION['username'])) {
                header("location: login");
                exit();
            }
            require_once 'models/Invoices.php';

            $invoices = new Invoices();
            $invoicesList = $invoices->displayInvoices();
            echo '<pre>';
            print_r($invoicesList);
            echo '</pre>';


            if ($_SESSION['role'] == 'admin') {
                $displayBtn = '<button><a href="newUser">Create new user</a></button>';

            } else if ($_SESSION['role'] == 'moderator') {
                $edit_delete = "class='invisible'";
                $displayBtn = "";
            } else {
                $edit_delete = "class='invisible'";
                $displayBtn = "";
            }
            echo("Hi " . $_SESSION['username'] . "\n");
            include_once "views/User_admin.vue.php";
        }
}