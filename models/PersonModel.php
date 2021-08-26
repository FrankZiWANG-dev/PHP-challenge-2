<?php

	include_once "src/Config/Database.php";
	
	class PersonModel
	{
		protected $db;
		protected $pdo;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
		public function inputFilter($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			
			return $data;
		}
	
		
	}

