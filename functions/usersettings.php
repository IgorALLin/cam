<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';
session_start();

if(!$user->isAuth())
	header('Location: http://localhost:8080/camagru/index.php');

else{
	$newValue = trim(htmlspecialchars(current($_POST)));
	if(isset($_POST['passwd']))
		$password = trim(htmlspecialchars($_POST['passwd']));
	$target = key($_POST);
	$uid = $_COOKIE['id'];
	$selector = 'id';
	$formManage = new PrivateFormsManagement($uid, $password, $user->db, $newValue, $target);

	if($target !== 'notification' && !$formManage->checkPassword()){
		$_SESSION['server_error'] = 'Wrong password';
		$_SESSION['form_js'] = 'formes/'.$target.'Change.php';
		header('Location: http://localhost:8080/camagru/index.php');
	}
	else{
		$formManage->change();
		if($target !== 'notification')
			$_SESSION['server_success'] = 'Youre '.$target.' changed';
		header('Location: http://localhost:8080/camagru/index.php');
	}
}

?>