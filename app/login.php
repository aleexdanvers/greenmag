<?php
    session_start();

    $servername = "mysql.hostinger.co.uk";
    $dbusername = "u495998595_admin";
    $dbpassword = "dmftw38QkZNB";
    $dbname = "u495998595_admin";

    $LoginUsername = trim(strip_tags(addslashes($_REQUEST['LoginUsername'])));
    $LoginPassword = md5($_REQUEST['LoginPassword']);

    $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    $loginquery  = "SELECT * FROM User WHERE Username = '" . $LoginUsername . "' AND Password = '" . $LoginPassword . "';";

    $result = mysqli_query($con, $loginquery);

    if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $facultyquery  = "SELECT * FROM Faculty WHERE FacultyID = '" . $row['FacultyID'] . "';";
      $rolequery  = "SELECT * FROM Role WHERE RoleID = '" . $row['RoleID'] . "';";
      $result2 = mysqli_query($con, $facultyquery);
      $result3 = mysqli_query($con, $rolequery);
      $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
      $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);

      //Logged In Variables
      $_SESSION["user_logged_in"] = true;
      $_SESSION["failed_login"] = false;
      $_SESSION["Username"] = $row['Username'];
      $_SESSION["Faculty"] = $row2['FacultyName'];;
      $_SESSION["Role"] = $row3['RoleName'];
      $_SESSION["ForgottenPasswordFailed"] = false;
      $_SESSION["ForgottenPasswordComplete"] = false;


    } else if (mysqli_num_rows($result) === 0) {
      //Failed Login
      $_SESSION["failed_login"] = true;
      $_SESSION["old_password_attempt"] = $_REQUEST['LoginPassword'];
      $_SESSION["old_username_attempt"] = $LoginUsername;
    }

    mysqli_close($con);
    header('Location: index.php');

?>