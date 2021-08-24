<?php
	
	interface UserInterface
	{
		public function register(array $form_vars = array());
		public function login($username, $password);
		public function logout();
		public function profile();
		public function remove();
		public function getUser();
	}