<?php

echo '<div id="settings_div">';
if (isset($_SESSION['server_error'])) {
  echo '<p style="color:red;text-align:center;" class="server_messages">'.$_SESSION["server_error"].'</p>';
  unset($_SESSION['server_error']);
}
else if (isset($_SESSION['server_success'])) {
  echo '<p style="color:green;text-align:center;" class="server_messages">'.$_SESSION["server_success"].'</p>';
  unset($_SESSION['server_success']);
} 
include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/Comment_mail_notification.php';
include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/mailChange.php';
include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/passwordChange.php';
include $_SERVER['DOCUMENT_ROOT'].'/camagru/formes/usernameChange.php';
echo '</div>';

echo '<div id="images">
		<form>
			<input name="frame" type="radio" value="carrot"><div class="images-child"><div class="image"><a href="#"><img id="carrot" src="icons/carrot.png" alt="=(("></a></div></div>
			<input name="frame" type="radio" value="coffee"><div class="images-child"><div class="image"><a href="#"><img id="coffee" src="icons/coffee.png" alt="=(("></a></div></div>
			<input name="frame" type="radio" value="football"><div class="images-child"><div class="image"><a href="#"><img id="football" src="icons/football.png" alt="=(("></a></div></div>
			<input name="frame" type="radio" value="gift"><div class="images-child"><div class="image"><a href="#"><img id="gift" src="icons/gift.png" alt="=(("></a></div></div>
			<input name="frame" type="radio" value="sheep"><div class="images-child"><div class="image"><a href="#"><img id="sheep" src="icons/sheep.png" alt="=(("></a></div></div>
		</form>
	</div>
	<div id="camera">
		<video id="video" width="640" height="460" autoplay></video>
		<div id="show_upload_photo"></div>
		<div id="upload_photo"></div>
		<p><button id="snap" disabled>Snap Photo</button></p>
		<p><canvas id="canvas" width="640" height="460"></canvas></p>
		<div id="st"></div>
	</div>';

?>