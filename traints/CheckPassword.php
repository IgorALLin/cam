<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/traints/GetHash.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

trait CheckPassword {
	use GetHash;

	public function Check($uid, $password) {
		$user_info = $user->get_user_info($uid);
		$user_password = $user_info['password'];
		$hashed_password = $this->hashFunc($password);
		if($user_password == $hashed_password)
			return True;
		else
			return False;
	}
}

?>