<?php

if(isset($_SESSION['form'])){
	include $_SESSION['form'];
	unset($_SESSION['form']); 
}

if($user->isAuth())
	include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/loged_in.php';

?>