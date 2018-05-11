<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

class QuerySelect extends UserQuery {

	public $row;
	
	function __construct($db, $value, $selector) {
		$this->sql = "SELECT * FROM `users` WHERE `".$selector."` = :value";
		$this->db = $db;
		parent::__construct();
		$this->stmt->bindParam(":value", $value);
		try {
			$this->stmt->execute(array(':value' => $value));
		}
		catch(PDOException $e) {
        	echo $e->getMessage();
        }  
        $this->row = $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
} 

?>