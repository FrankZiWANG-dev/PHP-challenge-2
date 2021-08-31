<?php
	
	require 'UserInterface.php';
	require 'UserException.php';
	
	class UserModel implements UserInterface
	{
		protected $connected;
		protected $user;
		protected $db;
		protected $vars;
		
		public function __construct(PDO $db)
		{
			$this->db = $db;
		}
		
		/**
		 * @throws Exception
		 */
		public function login($username, $password)
		{
			return true;
		}
		
	}