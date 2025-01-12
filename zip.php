<?php 
	session_start();
	if (substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1) != 'admin.php') {
		header('Location: admin.php');
		die();
	}

	include 'includes/dbConnection.php';

	$currentYearQuery = "SELECT * FROM AcademicYear WHERE currentYear = 1;";
	$currentYear = mysqli_fetch_array(mysqli_query($con, $currentYearQuery), MYSQLI_ASSOC);

	$files = [];
	$articlezipquery  = "SELECT Article.DocPath, Article.ImagePath FROM Article WHERE AcademicYearID = " . $currentYear['AcademicYearID'] . ";";
    $result = mysqli_query($con, $articlezipquery); 
    while($row = mysqli_fetch_array($result)){
    	$images = explode(";", $row['ImagePath']);
    	$documentvar = "article_docs/" . $row['DocPath'];
    	if (!in_array($documentvar, $files)){
    		array_push($files, $documentvar);
		}
		$imageone = "article_images/" . $images[0];
		$imagetwo = "article_images/" . $images[1];
		$imagethree = "article_images/" . $images[2];
		if (!in_array($imageone, $files)){
    		array_push($files, $imageone);
		}
    	if(count($images) >= 2) {
    		if (!in_array($imagetwo, $files)){
    			array_push($files, $imagetwo);
			}
    	}
    	if(count($images) == 3) {
    		if (!in_array($imagethree, $files)){
    			array_push($files, $imagethree);
			}
    	}
    }

	$dateNow = date_create(gmdate("Y-m-d H:i:s"));
	$dateNowNewFormat = date_format($dateNow, "dmY_Hi");
	$zipname = $dateNowNewFormat . '_zipfiles.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	foreach ($files as $file) {
	  $zip->addFile($file);
	}
	$zip->close();

	header('Content-Type: application/zip');
	header('Content-disposition: attachment; filename='.$zipname);
	header('Content-Length: ' . filesize($zipname));
	readfile($zipname);

?>