<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/traints/GetHash.php';

class User {
	
	use GetHash;

	public $db;

	function __construct($dbh) {
		$this->db = $dbh;
	}

	public function get_user_info ($id) {
		try {
			$sql = ("SELECT * FROM `users` WHERE `id` = :id");
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $id);
			$stmt->execute(array(':id' => $id));
			$res = $stmt->fetch(PDO::FETCH_ASSOC);
			return($res);
		}
		catch(PDOException $e) {
           echo $e->getMessage();
        }  
	}

	public function register($username, $passwd, $mail) {
		try {
			$hashedPass = $this->hashFunc($passwd);
			$sql = ("INSERT INTO `users`(`username`, `mail`, `password`) VALUES (:username, :mail, :passwd)");
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":mail", $mail);
            $stmt->bindParam(":passwd", $hashedPass, PDO::PARAM_STR);
			$stmt->execute();

			return($stmt);
		}
		catch(PDOException $e) {
           echo $e->getMessage();
        }  
	}

	public function login($login, $password) {
		try {
			$sql = ("SELECT * FROM `users` WHERE `username` = :login OR `mail` = :login");
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":login", $login);
			$stmt->execute(array(':login' => $login));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);

			return($row);
		}
		catch(PDOException $e) {
           echo $e->getMessage();
        }  
	}
	
	public function logout() {
		SetCookie("id", "", time() - 1, '/'); //удаляем cookie с логином 	
		SetCookie("hash", "", time() - 1, '/'); //удаляем cookie с паролем 
		SetCookie("uname", "", time() - 1, '/'); //удаляем cookie с паролем 
	}

	public function isAuth() {
		if (!empty($_COOKIE['id']) || !empty($_COOKIE['hash'])) {
			$id = $_COOKIE['id'];

			try {
				$sql = ("SELECT `id`, `token` FROM `users` WHERE `id` = :id");
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				$stmt->execute(array(':id' => $id));
				$row=$stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e) {
           		echo $e->getMessage();
       		}  

			if ($row && count($row) < 1 || $_COOKIE['hash'] !== $row['token']) {
				return (FALSE);
			}
			else {
				return (TRUE);
			}
		}
		else {
			return (FALSE);
		}
	}

}

?>