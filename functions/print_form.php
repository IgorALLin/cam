<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

if(isset($_POST['form'])) {
	$form = $_POST['form'];

	switch ($form) {
		case 'Signup':
			include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/regform.php';
			break;
		
		case 'Signin':
			include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/logform.php';
			break;

		case 'Forgot password':
			include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/forgotpassword.php';
			break;
	}
}

?>