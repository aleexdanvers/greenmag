<?php
	session_start();
	include 'includes/dbConnection.php';
	if($_SESSION["user_logged_in"] == false){
		header('Location: logout.php');
	}

	$newTitle = $_REQUEST['articleName'];
	$newDescritption = $_REQUEST['articleDescription'];

	$updateQuery = "UPDATE Article SET ArticleName = '" . $newTitle . "', ArticleDescription = '" . $newDescritption . "' WHERE ArticleID = '" . $_SESSION['articleID'] . "';";
	mysqli_query($con, $updateQuery);

	$target_dir = "article_docs/";
	// $fileName = printf("%s\r\n", uniqid());
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if($fileType == "doc" || $fileType == "docx" || $fileType == "pdf") {
			$uploadOk = 1;
	} else {
			echo "Sorry, only Word documents or PDF allowed.";
			$uploadOk = 0;
	}

	if ($uploadOk == 0) {
			header('Location: updatearticle.php?id='.$_SESSION['articleID']);
			// die();
	} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$updateFileQuery = "UPDATE Article SET DocPath = '" . basename($_FILES["fileToUpload"]["name"]) . "' WHERE ArticleID = " . $_SESSION['articleID'] . ";";
					mysqli_query($con, $updateFileQuery);
					mysqli_close($con);
					unset($_SESSION['articleID']);
					header('Location: home.php');
			} else {
					mysqli_close($con);
					header('Location: updatearticle.php?id='.$_SESSION['articleID']);
					unset($_SESSION['articleID']);
					echo "boooo";
			}
	}
?>