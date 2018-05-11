<?php

echo '<div class="form">
        <h1 style="text-align:center">Password Recovery</h1>
        <form action="functions/passwordrecovery.php" method="post">
          <div class="row">
            <div class="col-25">
              <label for="email">Email:</label>
            </div>
            <div class="col-75">
              <input type="Email" maxlength="25" name="email" placeholder="Enter youre email..." required>
            </div>
          </div>
          <div class="row">
            <input type="submit" name="action" value="Confirm">
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