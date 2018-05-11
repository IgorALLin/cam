<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

$user_id = $_COOKIE['id'];
$photo_id = $_POST['photo_id'];

$photo_owner = $gallery->findeOwner($photo_id);
$user_info = $user->get_user_info($photo_owner);

if($user_info['notification'] !== 'N'){
	$umail = $user_info['mail'];
	$uname = $user_info['username'];

	$mail = new SendMail($umail, $uname);
	$mail->commet_message();	
}

?>