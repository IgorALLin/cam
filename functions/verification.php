<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

if (isset($_GET['login']) && isset($_GET['hash'])) {
	$username = $_GET['login'];
	$selector = 'username';
	$newValue = 'y';
	$target = 'verified';
	$hash = $_GET['hash'];

	$select = new QuerySelect($user->db, $username, $selector);
	if ($select->row['verified'] == 'y') {
		$_SESSION['alert'] = 'This account has already been confirmed';
	}
	else {
		if ($hash == $user->hashFunc($username)) {
			$ChangeData = new QueryUpdate($user->db, $target, $newValue, $selector, $username);
			$_SESSION['alert'] = 'Your account has been confirmed';
		}
		else {
			$_SESSION['alert'] = 'Wrong verification URL';
		}
	}
}
else {
	$_SESSION['alert'] = 'Wrong verification URL';
}

header('Location: http://localhost:8080/camagru/index.php');

?>