<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

$dir_name = $_SERVER['DOCUMENT_ROOT'].'/camagru/'.'user_upload/';
// Пути загрузки файлов
// Массив допустимых значений типа файла
$types = array('image/gif', 'image/png', 'image/jpeg');
// Максимальный размер файла
$size = 1024000;

if(empty($_FILES['picture']['name']))
	$_SESSION['upload'] = 'No photo';
// Проверяем тип файла
else if (!in_array($_FILES['picture']['type'], $types)){
	$_SESSION['upload'] = 'Bad file type';
}
// Проверяем размер файла
else if ($_FILES['picture']['size'] > $size){
	$_SESSION['upload'] = 'Too big file';
}
else {
	$exploded = explode('.',$_FILES['picture']['name']);
	$ext = array_pop($exploded);
	$uiid = uniqid();
	$user_photo = $uiid.'.'.$ext;

	if (!file_exists($dir_name)) {
  		mkdir($dir_name);
	}

	copy($_FILES['picture']['tmp_name'], $dir_name.$user_photo);
	$_SESSION['upload'] = 'user_upload/'.$user_photo;
	//$gallery->addImg($_COOKIE["id"], $uiid . $ext);
}

header('Location: http://localhost:8080/camagru/index.php');

?>