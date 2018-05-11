<?php

class UserQuery {
	
	protected $db;
	protected $sql;
	protected $stmt;

	function __construct() {
		$this->stmt = $this->db->prepare($this->sql);
	}
}

?>