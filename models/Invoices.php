<?php

class Invoices
{
    private Database $db;
    private $pdo;

    public function __construct() {
        $this->db = new Database();
        $this->pdo = $this->db->connect();
    }

    public function displayInvoices()
    {
        $log = $this->pdo->prepare("SELECT * FROM invoice LEFT JOIN company ON invoice.compagny_id = company.id");
        $log->execute();
        return $log->fetchAll();
    }
}

SELECT
	number as invoice_number,
	date as invoice_date,
    name as compagny_name
FROM invoice
INNER JOIN company
   ON invoice.company_id = company.id