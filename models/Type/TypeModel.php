<?php
	
	include_once 'TypeException.php';
	include_once 'TypeInterface.php';
	include_once 'src/Config/Database.php';
	
	class TypeModel implements TypeInterface
	{
		protected $db;
		protected $pdo;
		protected $types;
		
		public function __construct() {
			$this->getConnection();
		}
		
		private function getConnection() {
			$this->db = new Database();
			$this->pdo = $this->db->connect();
		}
		
		private function setTypes()
		{
			$sql =
				"SELECT id,type
        FROM type
        ORDER BY type DESC
        ";
			
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$types = $stmt->fetchAll();
			$stmt->closeCursor();
			
			$this->types = $types;
		}
		
		public function getTypes() {
			$this->setTypes();
			return $this->types;
		}
		
	}