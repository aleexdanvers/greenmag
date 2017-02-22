<?php
    session_start();

    $servername = "mysql.hostinger.co.uk";
    $dbusername = "u495998595_admin";
    $dbpassword = "dmftw38QkZNB";
    $dbname = "u495998595_admin";

    $registerEmail = trim(strip_tags(addslashes($_REQUEST['RegisterUsername'])));
    $registerPassword = $_REQUEST['RegisterPassword'];
    $registerFaculty = $_REQUEST['option'];

    $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    $loginquery  = "SELECT * FROM User WHERE Username = '" . $registerEmail . "';";

    $result = mysqli_query($con, $loginquery);

    if (mysqli_num_rows($result) > 0) {
      $_SESSION["registerUsername"] = $registerEmail;
      $_SESSION["usernameTaken"] = true;
    } else if (mysqli_num_rows($result) === 0) {
      $facultyquery  = "SELECT * FROM Faculty WHERE FacultyID = '" . $registerFaculty . "';";
      $result2 = mysqli_query($con, $facultyquery);
      $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
      $facultyText = $row2['FacultyName'];

      $sql = "INSERT INTO User (Username, Password, FacultyID, RoleID) VALUES ('" . $registerEmail . "','" . md5($registerPassword) . "','" . $registerFaculty . "','4')";

      if (mysqli_query($con, $sql)) {
          $to = $registerEmail;
          $subject = "Greenmag - Account Registered";
          $txt = "Hello,<br><br>You recently registered an account with Greenmag. Your new details are listed below:<br><br>Username: <strong>" . $registerEmail . "</strong><br>Password: <strong>" . $registerPassword . "</strong><br>Faculty: <strong>" . $facultyText . "</strong><br>Role: <strong>Student</strong><br><br>To complete the process, please login to your account using your new details.<br><br>Thank you,<br><br>Greenmag Team";
          $headers = "From: noreply@greenmag.co.uk" . "\r\n";
          $headers .= "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          mail($to,$subject,$txt,$headers);
          $_SESSION["user_logged_in"] = true;
          $_SESSION["failed_login"] = false;
          $_SESSION["Username"] = $registerEmail;
          $_SESSION["Faculty"] = $facultyText;
          $_SESSION["Role"] = "Student";
          $_SESSION["ForgottenPasswordFailed"] = false;
          $_SESSION["ForgottenPasswordComplete"] = false;
          $_SESSION["usernameTaken"] = false;
      }
      
      else {
          echo "Error: " . mysqli_error($con);
      }

    }

    mysqli_close($con);
    header('Location: index.php');

?>