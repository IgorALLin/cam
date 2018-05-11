<?php

echo '<div class="form" name="Change name" id="ch_name">
	  		<h1 style="text-align:center">Change Name</h1>
		    <form action="functions/usersettings.php" method="post" autocomplete="off">
			    <div class="row">
			      <div class="col-25">
			        <label for="username">New Username:</label>
			      </div>
			      <div class="col-75">
			        <input type="text" maxlength="25" minlength="3" autocomplete="off" name="username" placeholder="Enter new username" required>
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-25">
			        <label for="passwd">Password</label>
			      </div>
			      <div class="col-75">
					<input type="password" name="passwd" placeholder="Enter password" required>
			      </div>
			    </div>
			    <div class="row">
			      <input type="submit" name="action" value="Confirm">
			    </div>
			 </form>
		</div>';
?>