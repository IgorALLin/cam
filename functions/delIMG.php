<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

$photoId = $_GET['photoId'];

if(is_numeric($photoId) && $photoId >= 0){
	$gallery->delIMG($photoId);
}
	
header('Location: http://localhost:8080/camagru/index.php?type=2');

?>