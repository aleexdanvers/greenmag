<?php 
if (substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1) != 'admin.php') {
	header('Location: admin.php');
	die();
}
session_start();

include 'includes/dbConnection.php';

$userID = $_REQUEST['id'];
$deleteUser = "DELETE FROM User WHERE UserID =" . $userID . ";";

mysqli_query($con, $deleteUser);	
mysqli_close($con);
header("Location: admin.php");
?>