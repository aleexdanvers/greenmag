<?php
	$articlePageRegEx = preg_match("/updatearticle.php\?id=/",substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1));
	if ($articlePageRegEx != 1) {
		header('Location: updatearticle.php?id='.$_SESSION['articleID']);
		die();
	}

	session_start();
	include 'includes/dbConnection.php';
	if($_SESSION["user_logged_in"] == false){
		header('Location: logout.php');
	}

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

	$newTitle = $_REQUEST['articleName'];
	$newDescritption = $_REQUEST['articleDescription'];

	$updateQuery = "UPDATE Article SET ArticleName = '" . $newTitle . "', ArticleDescription = '" . $newDescritption . "' WHERE ArticleID = '" . $_SESSION['articleID'] . "';";
	mysqli_query($con, $updateQuery);

	if (!empty($_FILES['fileToUpload']['name'])) {
		$target_dir = "article_docs/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$newFileName = randomPassword() . '.' . $fileType;
		$fullPath = $target_dir . $newFileName;

		if($fileType == "doc" || $fileType == "docx" || $fileType == "pdf") {
				$uploadOk = 1;
		} else {
				$_SESSION['errorUpdate'] = "Sorry, only Word or PDF documents allowed.";
				$uploadOk = 0;
		}

		if ($uploadOk == 0) {
				if (!isset($_SESSION['errorUpdate'])) {
					$_SESSION['errorUpdate'] = "Sorry, something went wrong.";
				}
				header('Location: updatearticle.php?id='.$_SESSION['articleID']);
		} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fullPath)) {
						$updateFileQuery = "UPDATE Article SET DocPath = '" . $newFileName . "' WHERE ArticleID = " . $_SESSION['articleID'] . ";";
						mysqli_query($con, $updateFileQuery);
						mysqli_close($con);
						unset($_SESSION['articleID']);
						header('Location: home.php');
				} else {
						$_SESSION['errorUpdate'] = "Sorry, something went wrong.";
						mysqli_close($con);
						unset($_SESSION['articleID']);
						header('Location: updatearticle.php?id='.$_SESSION['articleID']);
				}
		}
	} else {
		header('Location: home.php');
	}
?>