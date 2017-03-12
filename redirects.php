<?php 
session_start();

if ($_SESSION["Role"] == 'Admin') {
	header('Location: admin.php');
} else if ($_SESSION["Role"] == 'Marketing Manager') {
	header('Location: marketingmanager.php');
} else if ($_SESSION["Role"] == 'Marketing Co-ordinator') {
	header('Location: marketingcoordinator.php');
} else if ($_SESSION["Role"] == 'Guest') {
	header('Location: guest.php');
} else if ($_SESSION["Role"] == 'Student') {
	header('Location: home.php');
}
?>