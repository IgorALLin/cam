<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

Class Gallery {

	public $db;

	function __construct($dbh) {
		$this->db = $dbh;
	}

	public function addImg($userid, $img) {
		try {
			$sql = ("INSERT INTO `gallery` (`userid`, `img`) VALUES (:userid, :img)");
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":userid", $userid);
			$stmt->bindParam(":img", $img);
			$stmt->execute();
			return($stmt);
		}catch(PDOException $e) {
           echo $e->getMessage();
        } 
	}

	public function takeIMG() {
		try {
			$sql = ("SELECT * FROM `gallery` ORDER BY `id` DESC");
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return($result);
		}catch(PDOException $e) {
           echo $e->getMessage();
        } 
	}

	public function count_all() {
		try {
			$sql = ("SELECT count(*) FROM `gallery`");
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$number_of_rows = $stmt->fetchColumn();
			return ($number_of_rows);
		}catch(PDOException $e) {
           echo $e->getMessage();
        }
	}

	public function count_user_photos($uid) {
		try {
			$sql = ("SELECT count(*) FROM `gallery` WHERE `userid` = :uid ORDER BY `id` DESC");
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":uid", $uid);
			$stmt->execute();
			$number_of_rows = $stmt->fetchColumn();
			return ($number_of_rows);
		}catch(PDOException $e) {
           echo $e->getMessage();
        }
	}

	public function takeUserImg ($uid) {
		try {
			$sql = ("SELECT * FROM `gallery` WHERE `userid` = :uid ORDER BY `id` DESC");
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":uid", $uid);
			$stmt->execute(array(':uid' => $uid));
			$row = $stmt->fetchAll();
			return ($row);
		}catch(PDOException $e) {
           echo $e->getMessage();
        }
	}

	public function delIMG($id) {
		try {
			$sql = ("DELETE FROM `gallery` WHERE `id` = :id");
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $id);
			$stmt->execute();
		}catch(PDOException $e) {
           echo $e->getMessage();
        }
	}

	public function findeOwner($id){
		try {
			$sql = ("SELECT `userid` FROM `gallery` WHERE `id` = :id");
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return($result[0]['userid']);
		}catch(PDOException $e) {
           echo $e->getMessage();
        }
	}
}

?>