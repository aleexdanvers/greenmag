<?php
    session_start();

    $servername = "mysql.hostinger.co.uk";
    $dbusername = "u495998595_admin";
    $dbpassword = "apb32axsoJVr";
    $dbname = "u495998595_admin";

    $LoginUsername = trim(strip_tags(addslashes($_REQUEST['login-email'])));
    $LoginPassword = md5($_REQUEST['login-password']);

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

      $updateQuery = "UPDATE User SET LastLoggedIn = '" . date("Y-m-d H:i:s") . "' WHERE Username = '" . $LoginUsername . "';";
      $result4 = mysqli_query($con, $updateQuery);

      $lastLoggedInDate = date_create($row['LastLoggedIn']);

      //Logged In Variables
      $_SESSION["user_logged_in"] = true;
      $_SESSION["failed_login"] = false;
      $_SESSION["failed_register"] = false;
      $_SESSION["Username"] = $row['Username'];
      $_SESSION["UserID"] = $row['UserID'];
      $_SESSION["FacultyID"] = $row['FacultyID'];
      $_SESSION["Faculty"] = $row2['FacultyName'];
      $_SESSION["Role"] = $row3['RoleName'];
      $_SESSION["LastLoggedIn"] = "Last Login: " . date_format($lastLoggedInDate, "jS F Y g:ia");
      $_SESSION["avatarChosen"] = $row['AvatarID'];

      mysqli_close($con);
      header('Location: http://www.greenmag.co.uk/home.php');


    } else if (mysqli_num_rows($result) === 0) {
      //Failed Login
      $_SESSION["failed_login"] = true;
      mysqli_close($con);
      header('Location: http://www.greenmag.co.uk/index.php');
    }
?>