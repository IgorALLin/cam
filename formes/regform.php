<?php

echo '<div class="form">
          <h1>Sign Up</h1>  
          <form action="functions/signup.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="uname">Username</label>
              </div>
              <div class="col-75">
                <input type="text" maxlength="25" name="username" placeholder="Enter Username" required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="email">Email</label>
              </div>
              <div class="col-75">
                <input type="email" name="mail" placeholder="Enter Email" required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="password1">Password</label>
              </div>
              <div class="col-75">
            <input type="password" id="password1" name="password" placeholder="Enter password" required">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="password2">Confirm password</label>
              </div>
              <div class="col-75">
                <input type="password" id="password2" name="password2" placeholder="Re-Enter password" required>
              </div>
            </div>
            <div class="row">
              <input type="submit" name="action" value="Sign Up">
            </div>';

            if (isset($_SESSION['server_error'])) {
              echo '<p style="color:red;text-align:center;">'.$_SESSION["server_error"].'</p>';
              unset($_SESSION['server_error']);
            }
            else if (isset($_SESSION['server_success'])) {
              echo '<p style="color:green;text-align:center;">'.$_SESSION["server_success"].'</p>';
              unset($_SESSION['server_success']);
            } 

          echo '</form>
        </div>';

?>