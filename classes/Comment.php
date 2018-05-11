<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

Class Comment {
	public $db;

	function __construct($dbh) {
		$this->db = $dbh;
	}

	public function save($userid, $galleryid, $comment) {
		try {
			$sql = "INSERT INTO `comment` (`userid`, `galleryid`, `comment`) VALUES (:userid, :galleryid, :comment)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":userid", $userid);
			$stmt->bindParam(":galleryid", $galleryid);
			$stmt->bindParam(":comment", $comment);
			$stmt->execute();
			return($stmt);
		}catch(PDOException $e) {
           echo $e->getMessage();
        } 
	}

	public function grab($galleryid) {
		try {
			$sql = "SELECT `comment`, `userid` FROM `comment` WHERE `galleryid` = :galleryid ORDER BY `id` DESC";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":galleryid", $galleryid);
			$stmt->execute(array(':galleryid' => $galleryid));
			$res = $stmt->fetchAll();
			return($res);
		}catch(PDOException $e) {
           echo $e->getMessage();
        } 
	}
}

?>