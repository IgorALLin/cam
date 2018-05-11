<?php

echo '<div class="form" name="change name">
	  		<h1 style="text-align:center">Change Name</h1>
		    <form action="functions/usersettings.php" method="post" autocomplete="off">
			    <div class="row">
			      <div class="col-25">
			        <label for="changeUname">New Username:</label>
			      </div>
			      <div class="col-75">
			        <input type="text" maxlength="25" minlength="3" id="username" autocomplete="off" name="username" placeholder="Enter new username" required onkeyup="isExist(this.value, this.name)">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="password">Password</label>
			      </div>
			      <div class="col-75">
					<input type="password" id="password" name="passwd" placeholder="Enter password" required>
			      </div>
			    </div>
			    <div class="row">
			      <input type="submit" id="confirm" name="action" value="Confirm">
			    </div>
			 </form>
		</div>';

echo '<div class="form" name="change password">
	  		<h1 style="text-align:center">Change Password</h1>
		    		<form action="functions/usersettings.php" method="post">
			    <div class="row">
			      <div class="col-25">
			        <label for="password1">New Password:</label>
			      </div>
			      <div class="col-75">
			        <input type="password" id="password1" maxlength="25" name="password" placeholder="Enter new password" required onkeyup="checkPassword(this.value)">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="password2">Confirm password</label>
			      </div>
			      <div class="col-75">
					<input type="password" id="password2" maxlength="25" name="password2" placeholder="Confirm password" required>
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="password">Password</label>
			      </div>
			      <div class="col-75">
					<input type="password" id="pass" maxlength="25" name="passwd" placeholder="Enter old password" required>
			      </div>
			    </div>
			    <div class="row">
			      <input type="submit" id="password" name="action" value="Confirm">
			    </div>
		  	</form>
		</div>';

echo '<div class="form" name="change mail">
	  		<h1 style="text-align:center">Change Mail</h1>
		    <form action="functions/usersettings.php" method="post">
			    <div class="row">
			      <div class="col-25">
			        <label for="changeMail">New Email:</label>
			      </div>
			      <div class="col-75">
			        <input type="Email" id="mail" name="mail" placeholder="Enter new username" required onkeyup="isExist(this.value, this.name)" onclick="isExist(this.value, this.name)" onmouseover="isExist(this.value, this.name)">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="password">Password</label>
			      </div>
			      <div class="col-75">
					<input type="password" id="password" maxlength="25" name="passwd" placeholder="Enter password" required>
			      </div>
			    </div>
			    <div class="row">
			      <input type="submit" id="confirm" name="action" value="Confirm">
			    </div>
		  	</form>
		</div>';		

echo '<div class="form" name="comment after mail">
		<h1>Resieve mail after comment under my photo?</h1>
		<form action="functions/check.php" method="post">
			<input id ="yes" name="recieve_mail" type="radio" value="Yes">
			<label for="yes">Yes</label>
			<input id ="no" name="recieve_mail" type="radio" value="No">
			<label for="no">No</label>
			<input type="submit" name="action" value="Save">
		</form>
	</div>';
?>