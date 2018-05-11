<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

$user->logout();
unset($_SESSION['form']);
header('Location: http://localhost:8080/camagru/index.php');

?>