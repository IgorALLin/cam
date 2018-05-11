<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

$user_id = $_COOKIE['id'];
$photo_id = $_POST['photo_id'];
$txt = htmlspecialchars($_POST['text']);

if(preg_match('/[A-Za-z0-9]/', $txt)){
	$comment->save($user_id, $photo_id, $txt);
	echo 'saved';
}

?>