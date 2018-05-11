<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

$selector = 'mail';
$mail = $_POST['email'];
$target = 'password';
$randomPass = rand(100000, 2000000);
$hash = $user->hashFunc($randomPass);


if (isset($_GET['action']) && $_GET['action'] == 'passwordrecovery' && !$user->isAuth()) {
	$_SESSION['form'] = 'formes/forgotpassword.php';
	header('Location: http://localhost:8080/camagru/index.php');
}

else if(isset($_POST['action']) && $_POST['action'] == 'Confirm'){
	$select = new QuerySelect($user->db, $mail, $selector);
	if ($mail == $select->row['mail'] && $select->row['verified'] == 'y') {
		$update = new QueryUpdate($user->db, $target, $hash, $selector, $mail);
		$sendMail = new SendMail($mail, $select->row['username']);
		$sendMail->passwordRecovery($randomPass);
		$_SESSION['form'] = 'formes/logform.php';
		$_SESSION['server_success'] = 'New password has been send to your email';
		header('Location: http://localhost:8080/camagru/index.php');
	}

	else if ($mail == $select->row['mail'] && $select->row['verified'] == 'N') {
		$_SESSION['form'] = 'formes/logform.php';
		$_SESSION['server_error'] = 'You need to confirm youre email first';
		header('Location: http://localhost:8080/camagru/index.php');
	}

	else {
		$_SESSION['form'] = 'formes/logform.php';
		$_SESSION['server_error'] = 'Wrong mail';
		header('Location: http://localhost:8080/camagru/index.php');
	}
}


?>