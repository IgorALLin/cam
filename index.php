<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

if (!isset($_SESSION['form']) && !$user->isAuth())
	$_SESSION['form'] = 'formes/regform.php';

?>

<!DOCTYPE html>
<html>

<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="style/index.css?ver=3">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

	<header>
		<div id="branding"><h1><a href="index.php">Camagru</h1></a></div>
		<div id="nav">
			<?php include 'header.php';?>
		</div>
	</header>
	
	<section>
		<div id="main">
			<div id="left-side">
				<?php include 'functions/forms.php'; ?>
			</div>
			<div id="right-side">
				<?php include $_SERVER['DOCUMENT_ROOT'].'/camagru/functions/sendIMG.php'; ?>
			</div>
		</div>
	</section>

	<footer>
		<?php include 'footer.php';?>
	</footer>

</body>
</html>

<script src="js/checkPass.js"></script>
<script src="js/isExist.js"></script>
<script src="js/alert.js"></script>
<script src="js/cam.js"></script>
<script src="js/likes.js"></script>
<script src="js/change_settings.js"></script>
<script>alertMsg()</script>