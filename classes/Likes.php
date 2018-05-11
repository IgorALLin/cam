<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

Class Likes {

	public $db;

	function __construct($dbh) {
		$this->db = $dbh;
	}

	function users_likes($uid) {
		$sql = "SELECT `galleryid`, `type` FROM `like` WHERE `userid` = :uid";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":uid", $uid);
		try {
			$stmt->execute(array(':uid' => $uid));
		}
		catch(PDOException $e) {
        	echo $e->getMessage();
        }
        $row = $stmt->fetchAll();
        return($row);  
	}

	public function count_likes($photo_id){
		$sql = ("SELECT count(*) FROM `like` WHERE `galleryid` = :photo_id AND `type` = 1");
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":photo_id", $photo_id);
		try {
			$stmt->execute(array(':photo_id' => $photo_id));
		}
		catch(PDOException $e) {
        	echo $e->getMessage();
        }
		$row = $stmt->fetchColumn();
		return($row); 
	}

	public function count_dislikes($photo_id){
		$sql = ("SELECT count(*) FROM `like` WHERE `galleryid` = :photo_id AND `type` = 2");
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":photo_id", $photo_id);
		try {
			$stmt->execute(array(':photo_id' => $photo_id));
		}
		catch(PDOException $e) {
        	echo $e->getMessage();
        }
		$row = $stmt->fetchColumn();
		return($row); 
	}

	public function user_like_by_id($userid, $galleryid) {
		$sql = ("SELECT `type` FROM `like` WHERE `userid` = :userid AND `galleryid` = :galleryid");
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":userid", $userid);
		$stmt->bindParam(":galleryid", $galleryid);
		try {
			$stmt->execute(array(':userid' => $userid, ':galleryid' => $galleryid));
		}
		catch(PDOException $e) {
        	echo $e->getMessage().' user_like_by_id';
        }
        $row = $stmt->fetchAll();
		return($row);
	}

	public function insert_like($userid, $galleryid, $type){
		$sql = ("INSERT INTO `like` (`userid`, `galleryid`, `type`) VALUES (:userid, :galleryid, :type)");
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":userid", $userid);
		$stmt->bindParam(":galleryid", $galleryid);
		$stmt->bindParam(":type", $type);
		try {
			$stmt->execute();
		}
		catch(PDOException $e) {
        	echo $e->getMessage().' insert_like';
        }
	}

	public function update_likes($userid, $galleryid, $type){
		$sql = ("UPDATE `like` SET `type` = :type WHERE `userid` = :userid AND `galleryid` = :galleryid");
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":galleryid", $galleryid);
		$stmt->bindParam(":type", $type);
		$stmt->bindParam(":userid", $userid);
		try {
			$stmt->execute();
		}
		catch(PDOException $e) {
        	echo $e->getMessage();
        }
	}


}

?>