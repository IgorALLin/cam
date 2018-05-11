<?php

echo '<div class="form" name="Change mail" id="ch_mail">
	  		<h1 style="text-align:center">Change Mail</h1>
		    <form action="functions/usersettings.php" method="post">
			    <div class="row">
			      <div class="col-25">
			        <label for="mail">New Email:</label>
			      </div>
			      <div class="col-75">
			        <input type="Email" name="mail" placeholder="Enter new username" required">
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="passwd">Password</label>
			      </div>
			      <div class="col-75">
					<input type="password" maxlength="25" name="passwd" placeholder="Enter password" required>
			      </div>
			    </div>
			    <div class="row">
			      <input type="submit" id="confirm" name="action" value="Confirm">
			    </div>
		  	</form>
		</div>';

?>