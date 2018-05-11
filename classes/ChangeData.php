<?php

class UserChangeData {

	private $newValue;
	private $password;
	private $action;
	private $uid;
	private $user;

	function __construct(User $user, $newValue, $password, $action, $uid) {
		$this->newValue = $newValue;
		$this->password = $password;
		$this->action = $action;
		$this->uid = $uid;
		$this->user = $user;
	}

	function checkPassword() {
		$sql = "SELECT `password` from `users` WHERE `id` = :id";
		$stmt = $this->user->db->prepare($sql);
		$stmt->execute(array(':id'=>$this->uid));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($row['password'] != $this->user->hashFunc($this->password)) {
			return (FALSE);
		}
		else {
			return (TRUE);
		}
	}

	function execute () {
		switch ($this->action) {
			case 'changeUname':
				$sql = "UPDATE `users` SET `username` = :newValaue WHERE `id` = :id";
				setcookie ("uname", $this->newValue, time() + 50000);
				break;
			
			case 'changeMail':
				$sql = "UPDATE `users` SET `mail` = :newValaue WHERE `id` = :id";
				break;

			case 'changePassword':
				$sql = "UPDATE `users` SET `password` = :newValaue WHERE `id` = :id";
				$this->newValue = $this->user->hashFunc($this->newValue);
				break;

			default:
				echo 'action ='.$this->action;
				break;
		}

		$stmt = $this->user->db->prepare($sql);
		$stmt->bindParam(":id", $this->uid);
        $stmt->bindParam(":newValaue", $this->newValue);
		$stmt->execute();
	}
}

?>