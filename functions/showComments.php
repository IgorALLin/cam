<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

function get_user_name($userid, $db) {
	$selector = 'id';
	$select = new QuerySelect($db, $userid, $selector);
	return($select->row['username']);
}

$photo_id = $_POST['photo_id'];

$comments = $comment->grab($photo_id);
foreach($comments as $val) {
	$username = get_user_name($val["userid"], $user->db);
	echo '<p><b>'.$username.'</b>:  '.$val["comment"].'<p\>';
}

?>