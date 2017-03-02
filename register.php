<?php
    session_start();

    $servername = "mysql.hostinger.co.uk";
    $dbusername = "u495998595_admin";
    $dbpassword = "apb32axsoJVr";
    $dbname = "u495998595_admin";

    $registerEmail = trim(strip_tags(addslashes($_REQUEST['register-email'])));
    $registerPassword = $_REQUEST['register-password'];
    $registerFaculty = $_REQUEST['option'];

    $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    $loginquery  = "SELECT * FROM User WHERE Username = '" . $registerEmail . "';";

    $result = mysqli_query($con, $loginquery);

    if (mysqli_num_rows($result) > 0) {

      $_SESSION["failed_register"] = true;
      mysqli_close($con);
      header('Location: http://www.greenmag.co.uk/index.php');


    } else if (mysqli_num_rows($result) === 0) {

      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $facultyquery  = "SELECT * FROM Faculty WHERE FacultyID = '" . $registerFaculty . "';";
      $result2 = mysqli_query($con, $facultyquery);
      $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
      $facultyText = $row2['FacultyName'];

      $sql = "INSERT INTO User (Username, Password, FacultyID, RoleID, AvatarID) VALUES ('" . $registerEmail . "','" . md5($registerPassword) . "','" . $registerFaculty . "','4','3')";

      $updateQuery = "UPDATE User SET LastLoggedIn = '" . date("Y-m-d H:i:s") . "' WHERE Username = '" . $registerEmail . "';";
      $result4 = mysqli_query($con, $updateQuery);

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
          $_SESSION["failed_register"] = false;
          $_SESSION["Username"] = $registerEmail;
          $_SESSION["UserID"] = $row['UserID'];
          $_SESSION["Faculty"] = $facultyText;
          $_SESSION["Role"] = "Student";
          $_SESSION["avatarChosen"] = $row['AvatarID'];
          $_SESSION["LastLoggedIn"] = "Welcome to Greenmag!";
          mysqli_close($con);
          header('Location: http://www.greenmag.co.uk/home.php');
      }
    }
?>