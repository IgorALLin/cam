<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

$user_id = $_COOKIE['id'];
$photo_id = $_POST['photo_id'];
$type = $_POST['type'];

$user_likes = $likes->user_like_by_id($user_id, $photo_id);

//var_dump($user_likes);


if ($user_likes)
	$likes->update_likes($user_id, $photo_id, $type);	
else{
	$likes->insert_like($user_id, $photo_id, $type);
}
	


?>