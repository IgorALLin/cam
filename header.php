<?php

if ($user->isAuth()) {
		echo '<div class="nav-child">
					<a href="functions/logout.php">Logout</a>
				</div>
				<div class="nav-child">
					<a href="index.php?type=1">All photos</a>
				</div>
				<div class="nav-child">
					<a href="index.php?type=2">My photos</a>
				</div>
			 </div>';

		echo '<div id="slide_panel">
				<span>User settings</span>
				<div id="hidden_slide">
					<a href="#"><p>Change name</p></a>
				    <a href="#"><p>Change mail</p></a>
				    <a href="#"><p>Change password</p></a>
				    <a href="#"><p>Mail features</p></a>
				</div>
			  </div>';
	}
	else {
		echo '<div class="nav-child"><a name="Signup" href="functions/signup.php">Signup</a></div>
			<div class="nav-child"><a name="Signin" href="functions/signin.php">Signin</a></div>';
	}


?>