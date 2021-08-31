<?php
	
	interface InvoiceInterface
	{
		public function create(array $form_vars = array());
		public function edit($invoice_id);
		public function delete($invoice_id);
	}