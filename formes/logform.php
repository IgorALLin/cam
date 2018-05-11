<?php

echo '<div class="form">
          <h1 style="text-align:center">Login</h1>  
          <form action="functions/signin.php" method="post">
            <div class="row">
              <div class="col-25">
                <label for="login">Login</label>
              </div>
              <div class="col-75">
                <input type="text" maxlength="25" name="login" placeholder="Enter Login" required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="password">Password</label>
              </div>
              <div class="col-75">
            <input type="password" name="password" placeholder="Enter password" required>
              </div>
            </div>
            <div id="forgotPass">
              <a href="functions/passwordrecovery.php?action=passwordrecovery">Forgot password</a>
            </div> 
            <div class="row">
              <input type="submit" name="action" value="Login">
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