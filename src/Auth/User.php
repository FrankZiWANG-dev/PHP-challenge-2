<?php
	
	require 'UserInterface.php';
	
	class User implements UserInterface
	{
		protected bool $connected;
		protected User $user;
		protected PDO $db;
		protected array $vars;
		
		public function __construct(PDO $db)
		{
			$this->db = $db;
		}
		
		/**
		 * @throws Exception
		 */
		public function login($username, $password): bool
		{
			return true;
		}
		
	}