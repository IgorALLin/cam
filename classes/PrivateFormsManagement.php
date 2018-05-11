<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

Class PrivateFormsManagement extends User{
	private $uid;
	private $newValue;
	private $target;
	private $password;

	public function __construct($uid, $password, $db, $newValue, $target){
		parent::__construct($db);
		$this->uid = $uid;
		$this->password = $password;
		$this->newValue = $newValue;
		$this->target = $target;
	}

	public function checkPassword(){
		$userPassword = $this->get_user_info($this->uid)['password'];
		$hashed = $this->hashFunc($this->password);
		if($userPassword !== $hashed)
			return false;
		else
			return true;
	}

	public function change(){
		if($this->target == 'password')
			$this->newValue = $this->hashFunc($this->newValue);
		
		$sql = "UPDATE `users` SET `".$this->target."` = :newValue WHERE `id` = :uid";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":newValue", $this->newValue);
		$stmt->bindParam(":uid", $this->uid);
		try {
			$stmt->execute();
		}
		catch(PDOException $e) {
        	echo $e->getMessage();
        }  
	}
}

?>