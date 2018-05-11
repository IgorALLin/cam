<?php

echo '<div class="form" name="Change password" id="ch_pass">
	  		<h1 style="text-align:center">Change Password</h1>
		    		<form action="functions/usersettings.php" method="post">
			    <div class="row">
			      <div class="col-25">
			        <label for="password">New Password:</label>
			      </div>
			      <div class="col-75">
			        <input type="password" id="password1" name="password" maxlength="25" placeholder="Enter new password" required>
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="password2">Confirm password</label>
			      </div>
			      <div class="col-75">
					<input type="password" id="password2" maxlength="25" placeholder="Confirm password" required>
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="password">Password</label>
			      </div>
			      <div class="col-75">
					<input type="password" maxlength="25" name="passwd" placeholder="Enter old password" required>
			      </div>
			    </div>
			    <div class="row">
			      <input type="submit" id="password" name="action" value="Confirm">
			    </div>
		  	</form>
		</div>';

?>