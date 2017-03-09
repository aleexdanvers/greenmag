<?php 
session_start();

include 'includes/dbConnection.php';

$articleTitle = $_REQUEST['articleTitle'];
$articleDescription = $_REQUEST['articleDescription'];
$article = $_FILES['articleToUpload'];
$image1 = $_FILES['imageToUpload1'];
$image2 = (!empty($_FILES['imageToUpload2']['name'])) ? $image2 = $_FILES['imageToUpload2'] : '';
$image3 = (!empty($_FILES['imageToUpload3']['name'])) ? $image3 = $_FILES['imageToUpload2'] : '';

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

} else {

}

// Image1 //
$imageDirectory = "article_images/";
$image1File = $imageDirectory . basename($image1["name"]);
$fileType = pathinfo($image1File,PATHINFO_EXTENSION);
$newFileNameImage1 = randomPassword() . '.' . $fileType;
$fullPathImage1 = $imageDirectory . $newFileNameImage1;

if (move_uploaded_file($image1["tmp_name"], $fullPathImage1)) {

} else {

}

// Image 2 //
if (!empty($image2)) {
	$imageDirectory = "article_images/";
	$image2File = $imageDirectory . basename($image2["name"]);
	$fileType = pathinfo($image1File,PATHINFO_EXTENSION);
	$newFileNameImage2 = randomPassword() . '.' . $fileType;
	$fullPathImage2 = $imageDirectory . $newFileNameImage2;

	if (move_uploaded_file($image2["tmp_name"], $fullPathImage2)) {

	} else {

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

	} else {

	}
}

header('Location: home.php');
?>
