<?php
	
	interface CompanyInterface
	{
		public function create(array $form_vars = array());
		public function update(array $form_vars = array());
		public function getCompanyById($company_id);
		public function delete($company_id);
	}