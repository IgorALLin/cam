<?php


echo '<div class="form" name="Mail features" id="ch_mail_send">
		<h1>Resieve mail after comment under my photo?</h1>
		<form action="functions/usersettings.php" method="post">
			<input id ="yes" name="notification" type="radio" value="Y" checked>
			<label for="yes">Yes</label>
			<input id ="no" name="notification" type="radio" value="N">
			<label for="no">No</label>
			<div class="row">
			      <input type="submit" name="action" value="Save">
			</div>
		</form>
	</div>';

?>