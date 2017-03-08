<?php 
session_start();
if (substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1) != 'marketingcoordinator.php') {
	header('Location: marketingcoordinator.php');
	die();
}

include 'includes/dbConnection.php';

if($_SESSION["user_logged_in"] == false){
	header('Location: logout.php');
}

$newComment = $_REQUEST['commentText'];
$newStatusID = $_REQUEST['statusID'];
$articleID = $_REQUEST['articleID'];

$currentInfoQuery = "SELECT Article.*,Status.* FROM Article INNER JOIN Status ON Article.StatusID=Status.StatusID WHERE ArticleID = " . $articleID . ";";
$result = mysqli_query($con, $currentInfoQuery);
$row = mysqli_fetch_array($result);

$userID = $row['UserID'];
$currentComment = $row['Comment'];
$currentStatusID = $row['StatusID'];
$articleName = $row['ArticleName'];

$statusQuery = "SELECT Status FROM Status WHERE StatusID = " . $newStatusID . ";";
$result2 = mysqli_query($con, $statusQuery);
$row2 = mysqli_fetch_array($result2);

if ($currentComment == $newComment) {
	$updateQuery = "UPDATE Article SET StatusID = " . $newStatusID . " WHERE ArticleID = " . $articleID . ";";
	$txt = "Hello,<br><br>A Marketing Coordinator for your faculty recently changed status of your article titled '" . $articleName . "'.<br><br><strong>Previous Status: </strong>" . $row['Status'] . "<br><strong>Current Status: </strong>" . $row2['Status'] . "<br><br>Log back into the system to see any further changes.<br><br>Thank you,<br><br>Greenmag Team";
} else if ($currentStatusID == $newStatusID) {
	$updateQuery = "UPDATE Article SET Comment = '" . $newComment . "' WHERE ArticleID = " . $articleID . ";";
	$txt = "Hello,<br><br>A Marketing Coordinator for your faculty recently added comment to your article titled '" . $articleName . "'.<br><br><strong>New Comment: </strong>" . $newComment . "<br><br>Log back into the system to see any further changes.<br><br>Thank you,<br><br>Greenmag Team";
} else if ($currentComment == $newComment && $currentStatusID == $newStatusID) {
	header('Location: home.php');
} else {
	$updateQuery = "UPDATE Article SET Comment = '" . $newComment . "', StatusID = " . $newStatusID . " WHERE ArticleID = " . $articleID . ";";
	$txt = "Hello,<br><br>A Marketing Coordinator for your faculty recently changed status of your article titled '" . $articleName . "'. Your Marketing Coordinator also added a comment.<br><br><strong>Previous Status: </strong>" . $row['Status'] . "<br><strong>Current Status: </strong>" . $row2['Status'] . "<br><br><strong>New Comment: </strong>" . $newComment . "<br><br>Log back into the system to see any further changes.<br><br>Thank you,<br><br>Greenmag Team";
}

$userQuery = "SELECT * FROM User WHERE UserID = " . $row['UserID'] . ";";
$result3 = mysqli_query($con, $userQuery);
$row3 = mysqli_fetch_array($result3);
$email = $row3['Username'];

mysqli_query($con, $updateQuery);
mysqli_close($con);

$to = $email;
$subject = "Greenmag - Article Update";
$headers = "From: noreply@greenmag.co.uk" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to,$subject,$txt,$headers);

header('Location: marketingcoordinator.php');
?>