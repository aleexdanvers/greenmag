<?php 
session_start();

include 'includes/dbConnection.php';

$articleTitle = $_REQUEST['articleTitle'];
$articleDescription = $_REQUEST['articleDescription'];
$article = $_FILES['articleToUpload'];
$image1 = $_FILES['imageToUpload1'];
$image2 = (!empty($_FILES['imageToUpload2']['name'])) ? $image2 = $_FILES['imageToUpload2'] : '';
$image3 = (!empty($_FILES['imageToUpload3']['name'])) ? $image3 = $_FILES['imageToUpload2'] : '';
$userID = $_SESSION['UserID'];
$dateNow = date("Y-m-d H:i:s");

function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array();
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < 10; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
		}
		return implode($pass);
}

// Article //
$articleDirectory = "article_docs/";
$articleFile = $articleDirectory . basename($article["name"]);
$fileType = pathinfo($articleFile,PATHINFO_EXTENSION);
$newFileNameArticle = randomPassword() . '.' . $fileType;
$fullPathArticle = $articleDirectory . $newFileNameArticle;

if (move_uploaded_file($article["tmp_name"], $fullPathArticle)) {
	$_SESSION['ErrorUpload'] = 'false';
} else {
	$_SESSION['ErrorUpload'] = 'true';
}

// Image1 //
$imageDirectory = "article_images/";
$image1File = $imageDirectory . basename($image1["name"]);
$fileType = pathinfo($image1File,PATHINFO_EXTENSION);
$newFileNameImage1 = randomPassword() . '.' . $fileType;
$fullPathImage1 = $imageDirectory . $newFileNameImage1;

if (move_uploaded_file($image1["tmp_name"], $fullPathImage1)) {
	$_SESSION['ErrorUpload'] = 'false';
} else {
	$_SESSION['ErrorUpload'] = 'true';
}

// Image 2 //
if (!empty($image2)) {
	$imageDirectory = "article_images/";
	$image2File = $imageDirectory . basename($image2["name"]);
	$fileType = pathinfo($image1File,PATHINFO_EXTENSION);
	$newFileNameImage2 = randomPassword() . '.' . $fileType;
	$fullPathImage2 = $imageDirectory . $newFileNameImage2;

	if (move_uploaded_file($image2["tmp_name"], $fullPathImage2)) {
		$_SESSION['ErrorUpload'] = 'false';
	} else {
		$_SESSION['ErrorUpload'] = 'true';
	}
}

// Image 3 //
if (!empty($image3)) {
	$imageDirectory = "article_images/";
	$image3File = $imageDirectory . basename($image3["name"]);
	$fileType = pathinfo($image1File,PATHINFO_EXTENSION);
	$newFileNameImage3 = randomPassword() . '.' . $fileType;
	$fullPathImage3 = $imageDirectory . $newFileNameImage3;

	if (move_uploaded_file($image3["tmp_name"], $fullPathImage3)) {
		$_SESSION['ErrorUpload'] = 'false';
	} else {
		$_SESSION['ErrorUpload'] = 'true';
	}
}

if (!isset($newFileNameImage2) && !isset($newFileNameImage3)) {
	$imgString = $newFileNameImage1;
} else if (isset($newFileNameImage2) && !isset($newFileNameImage3)) {
	$imgString = $newFileNameImage1 . ';' . $newFileNameImage2;
} else if (isset($newFileNameImage2) && isset($newFileNameImage3)) {
	$imgString = $newFileNameImage1 . ';' . $newFileNameImage2 . ';' . $newFileNameImage3;
} else if (!isset($newFileNameImage2) && isset($newFileNameImage3)) {
	$imgString = $newFileNameImage1 . ';' . $newFileNameImage3;
}

$currentYear = "SELECT AcademicYearID FROM AcademicYear WHERE CurrentYear = 1";
$currentYearRow = mysqli_fetch_array(mysqli_query($con, $currentYear), MYSQLI_ASSOC);

$insertQuery = "INSERT INTO Article (UserID, ArticleName, ArticleDescription, DateSubmitted, AcademicYearID, StatusID, DocPath, ImagePath) VALUES (" . $userID . ", '" . $articleTitle . "','" . $articleDescription . "','" . $dateNow . "','" . $currentYearRow['AcademicYearID'] . "','2','" . $newFileNameArticle . "','" . $imgString . "');";
mysqli_query($con, $insertQuery);
// echo $insertQuery;
// echo "<br>";
$coordinatorEmailQuery = "SELECT Username FROM User WHERE FacultyID=" . $_SESSION["FacultyID"] . " AND RoleID=3;";
// $row = mysqli_fetch_array(mysqli_query($con, $coordinatorEmailQuery));

// while ($row = mysqli_fetch_array(mysqli_query($con, $coordinatorEmailQuery))) {
	// $to = $row['Username'];
	// echo $to;
	// echo "<br>";
	// $subject = "Greenmag - Article Upload";
	// $txt = "Hello,<br><br>A Student within your faculty just uploaded a new article titled '" . $articleTitle . "'. You can see details below.<br><br><strong>Article Title: </strong>" . $articleTitle . "<br><strong>Article Description: </strong>" . $articleDescription . "<br><br>Log back into the system to see any further changes.<br><br>You have 14 days to add comments and change status.<br><br>Thank you,<br><br>Greenmag Team";
	// $headers = "From: noreply@greenmag.co.uk" . "\r\n";
	// $headers .= "MIME-Version: 1.0" . "\r\n";
	// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// mail($to,$subject,$txt,$headers);
}
// $to = $row['Username'];


mysqli_close($con);
header('Location: home.php');
?>
