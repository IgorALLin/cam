<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/functions/sendIMG.php';

$images = '../img/';
$postdata = file_get_contents("php://input");

if (isset($postdata)) {
	$imageData = $postdata;
	$filteredData = substr($imageData, strpos($imageData, ",") + 1);
	$unencodedData = base64_decode($filteredData);
	
	$uiid = uniqid();

	if (!file_exists($images)) {
  		mkdir($images);
	}

	file_put_contents($images . $uiid . '.png', $unencodedData);
	$gallery->addImg($_COOKIE["id"], $uiid . '.png');

}

?>