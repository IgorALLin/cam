<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

class QueryUpdate extends UserQuery{

	public $row;
	
	function __construct($db, $target, $newvalue, $selector, $selectorvalue) {
		$this->sql = "UPDATE `users` SET `".$target."` = :newvalue WHERE `".$selector."` = :selectorvalue";
		$this->db = $db;
		parent::__construct();
		$this->stmt->bindParam(":newvalue", $newvalue);
		$this->stmt->bindParam(":selectorvalue", $selectorvalue);
		try {
			$this->stmt->execute();
		}
		catch(PDOException $e) {
        	echo $e->getMessage();
        }  
	}
} 

?>