<?php
	
	class Database
	{
		private string $host = 'localhost';
		private string $dbname = 'accounting_cogip';
		private string $login = 'root';
		private string $password = 'root';
		
		// public function __construct() {  }
		
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
