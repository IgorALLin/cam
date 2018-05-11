<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

if($user->isAuth()){
	unset($_SESSION['form']);
	header('Location: http://localhost:8080/camagru/index.php');
}
	
else if (isset($_POST['action'])) {
	$salt = rand(100, 999); 
	$login = trim(htmlspecialchars($_POST['login']));
	$password = trim(htmlspecialchars($_POST['password']));

	$row = $user->login($login, $password);
	if(count($row) < 1 || $row['password'] !== $user->hashFunc($password)) {
		$_SESSION['server_error'] = "Wrong username or password!";
		$_SESSION['form'] = 'formes/logform.php';
		header('Location: http://localhost:8080/camagru/index.php');
	}
	else if ($row['verified'] == 'N') {
		$_SESSION['server_error'] = "You need to confirm youre e-mail!";
		$_SESSION['form'] = 'formes/logform.php';
		header('Location: http://localhost:8080/camagru/index.php');
	}
	else {
		$token = $user->hashFunc($password.$salt);

		try {
			$sql = "UPDATE `users` SET `token` = :token WHERE `username` = :username";
			$stmt = $user->db->prepare($sql);
			$stmt->bindParam(":token", $token);
			$stmt->bindParam(":username", $login);
			$stmt->execute();
		}
		catch(PDOException $e) {
       		echo $e->getMessage();
    	}  
		
		setcookie ("id", $row['id'], time() + 50000, '/');
		setcookie ("hash", $token, time() + 50000, '/');
		setcookie ("uname", $row['username'], time() + 50000, '/');
		header('Location: http://localhost:8080/camagru/index.php');
	}
}

else {
	$_SESSION['form'] = 'formes/logform.php';
	header('Location: http://localhost:8080/camagru/index.php');	
}

?>