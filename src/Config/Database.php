<?php
	
	class Database
	{
		private $host = 'localhost';
		private $dbname = 'accounting_cogip';
		private $login = 'root';
		private $password = 'root';
		
		public function __construct() {  }
		
		function connect() {
			try {
				// db connection
				$dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
				$login = $this->login;
				$password = $this->password;
				$db = new PDO($dsn, $login, $password);
				// Configuration driver : exceptions
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Obligatory for further
			}
			catch(Exception $e) {
				die("Error : " . $e->getMessage());
			}
			finally {
				return ($db);
			}
		}
	}
