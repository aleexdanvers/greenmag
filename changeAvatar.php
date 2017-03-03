<?php 
session_start();

include 'includes/dbConnection.php';

$avatarChosen = $_REQUEST['selectedAvatar'];
$_SESSION['avatarChosen'] = $avatarChosen;

$updateQuery = "UPDATE User SET AvatarID = '" . $avatarChosen . "' WHERE Username = '" . $_SESSION['Username'] . "';";

$result = mysqli_query($con, $updateQuery);

mysqli_close($con);
header('Location: avatar.php');
?>