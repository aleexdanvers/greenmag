<?php
    session_start();
    if (substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1) != 'index.php') {
      header('Location: index.php');
      die();
    }

    include 'includes/dbConnection.php';

    $forgottenEmail = trim(strip_tags(addslashes($_REQUEST['ForgotUsername'])));
    $_SESSION["ForgottenPasswordEmail"] = $forgottenEmail;

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 10; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    $loginquery  = "SELECT * FROM User WHERE Username = '" . $forgottenEmail . "';";

    $result = mysqli_query($con, $loginquery);

    if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $newPassword = randomPassword();
      $newPasswordMD5 = md5($newPassword);

      $sql = "UPDATE User SET Password= '" . $newPasswordMD5 . "' WHERE Username='" . $forgottenEmail . "'";

      if (mysqli_query($con, $sql)) {
          $to = $forgottenEmail;
          $subject = "Greenmag - Forgotten Password";
          $txt = "Hello,<br><br>You recently asked us to reset your forgotten password. Your new details are listed below:<br><br>Username: <strong>" . $forgottenEmail . "</strong><br>Password: <strong>" . $newPassword . "</strong><br><br>To complete the process, please login to your account using your new password.<br><br>Thank you,<br><br>Greenmag Team";
          $headers = "From: noreply@greenmag.co.uk" . "\r\n";
          $headers .= "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          mail($to,$subject,$txt,$headers);

          //Logged In Variables
          $_SESSION["ForgottenPasswordComplete"] = true;
          $_SESSION["ForgottenPasswordFailed"] = false;
      
      }
      
      else {
          echo "Error: " . mysqli_error($con);
      }


    } else if (mysqli_num_rows($result) === 0) {
      //Failed Login
      $_SESSION["ForgottenPasswordFailed"] = true;
      $_SESSION["ForgottenPasswordComplete"] = false;
    }

    mysqli_close($con);
    header('Location: index.php');

?>