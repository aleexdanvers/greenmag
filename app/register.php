<?php
    session_start();

    $servername = "mysql.hostinger.co.uk";
    $dbusername = "u495998595_admin";
    $dbpassword = "dmftw38QkZNB";
    $dbname = "u495998595_admin";

    $registerEmail = trim(strip_tags(addslashes($_REQUEST['RegisterUsername'])));
    $registerPassword = $_REQUEST['RegisterPassword'];
    $registerPasswordMD5 = md5($_REQUEST['RegisterPassword']);

    $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    $loginquery  = "SELECT * FROM User WHERE Username = '" . $registerEmail . "';";

    $result = mysqli_query($con, $loginquery);

    if (mysqli_num_rows($result) > 0) {

    //Username in use


    } else if (mysqli_num_rows($result) === 0) {


      //$sql = "UPDATE User SET Password= '" . $newPasswordMD5 . "' WHERE Username='" . $forgottenEmail . "'";

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
          echo "Error updating record: " . mysqli_error($con);
      }

    }

    mysqli_close($con);
    header('Location: index.php');

?>