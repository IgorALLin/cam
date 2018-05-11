<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

if($user->isAuth())
	echo 'true';
else
	echo 'false';

?>