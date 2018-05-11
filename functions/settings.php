<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

$form = $_POST['form'];
switch ($form) {
	case 'ch_name':
		include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/usernameChange.php';
		break;
	case 'ch_mail':
		include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/mailChange.php';
		break;
	case 'ch_password':
		include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/passwordChange.php';
		break;
	case 'ch_features':
		include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/Comment_mail_notification.php';
		break;
}

?>

