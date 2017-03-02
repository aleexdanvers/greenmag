<?php 
session_start();

$servername = "mysql.hostinger.co.uk";
$dbusername = "u495998595_admin";
$dbpassword = "apb32axsoJVr";
$dbname = "u495998595_admin";

$avatarChosen = $_REQUEST['selectedAvatar'];
$_SESSION['avatarChosen'] = $avatarChosen;

$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
$updateQuery = "UPDATE User SET AvatarID = '" . $avatarChosen . "' WHERE Username = '" . $_SESSION['Username'] . "';";

$result = mysqli_query($con, $updateQuery);

mysqli_close($con);
header('Location: http://greenmag.co.uk/avatar.php');
?>