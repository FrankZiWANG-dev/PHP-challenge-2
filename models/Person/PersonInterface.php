<?php
	
	interface PersonInterface
	{
		public function create(array $form_vars = array());
		public function update(array $form_vars = array());
		public function delete($person_id);
	}