<?php 

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/camagru/config/setup.php';

if($user->isAuth()){
  unset($_SESSION['form']);
  header('Location: http://localhost:8080/camagru/index.php');
}

else if(isset($_POST['action'])) {
  $username = trim(htmlspecialchars($_POST['username']));
	$passwd = trim(htmlspecialchars($_POST['password']));
	$mail = trim(htmlspecialchars($_POST['mail']));
    
  try {
    $sql = "SELECT `username`, `mail` FROM `users` WHERE `username` = :username OR `mail` = :mail";
    $stmt = $user->db->prepare($sql);
    $stmt->execute(array(':username'=>$username, ':mail'=>$mail));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    if($row['username'] == $username) {
      $_SESSION['server_error'] = "Username already taken!";
      header('Location: http://localhost:8080/camagru/index.php');
    }
    else if($row['mail'] == $mail) {
        $_SESSION['server_error'] = "Email id already taken!";
        header('Location: http://localhost:8080/camagru/index.php');
    }
    else {
        if($user->register($username,$passwd,$mail)) {
          $confirm = new SendMail($mail, $username);
          $confirm->verification();
          $_SESSION['server_success'] = 'Your account has been made, please verify it by clicking the activation link that has been send to your email';
          header('Location: http://localhost:8080/camagru/index.php');
        }
    }
  }
  catch(PDOException $e) {
      echo $e->getMessage();
  }
}

else {
	$_SESSION['form'] = 'formes/regform.php';
	header('Location: http://localhost:8080/camagru/index.php');
}

?>