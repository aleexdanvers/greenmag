<?php
    session_start();

    include 'includes/dbConnection.php';

    if (substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1) != 'home.php') {
      header('Location: home.php');
      die();
    }

		$loginUsername = $_SESSION['Username'];
		$oldPassword = md5($_REQUEST['previousPassword']);
		$newPassword = md5($_REQUEST['newPassword']);

    $loginquery  = "SELECT * FROM User WHERE Username = '" . $loginUsername . "' AND Password = '" . $oldPassword . "';";

    $result = mysqli_query($con, $loginquery);

    if (mysqli_num_rows($result) > 0) {
			$updateQuery = "UPDATE User SET Password = '" . $newPassword . "' WHERE Username = '" . $loginUsername . "';";
			
			mysqli_query($con, $updateQuery);
			
			$to = $loginUsername;
			$subject = "Greenmag - Changed Password";
			$txt = "Hello,<br><br>You recently changed your password. Your new details are listed below:<br><br>Username: <strong>" . $_SESSION['Username'] . "</strong><br>Password: <strong>" . $_REQUEST['newPassword'] . "</strong><br><br>To complete the process, please login to your account using your new password.<br><br>Thank you,<br><br>Greenmag Team";
			$headers = "From: noreply@greenmag.co.uk" . "\r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			mail($to,$subject,$txt,$headers);
			$_SESSION['updateSuccessful'] = 'true';
    } else if (mysqli_num_rows($result) === 0) {
			$_SESSION['updateSuccessful'] = 'false';
    }

    mysqli_close($con);
    header('Location: home.php');
?>