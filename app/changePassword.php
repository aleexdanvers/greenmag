<?php
    session_start();

    $servername = "mysql.hostinger.co.uk";
    $dbusername = "u495998595_admin";
    $dbpassword = "dmftw38QkZNB";
    $dbname = "u495998595_admin";

		$loginUsername = $_SESSION['Username'];
		$oldPassword = md5($_REQUEST['previousPassword']);
		$newPassword = md5($_REQUEST['newPassword']);

    $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

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
			
			$_SESSION['updateSuccessful'] = true;
			$_SESSION["user_logged_in"] = true;
    } else if (mysqli_num_rows($result) === 0) {
			$_SESSION['updateFailed'] = false;
    }

    mysqli_close($con);
    header('Location: index.php');
?>