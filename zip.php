<?php 
	session_start();
	include 'includes/dbConnection.php';

	$files = [];
	$articlezipquery  = "SELECT Article.DocPath, Article.ImagePath FROM Article;";
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


	$zipname = 'zipfiles.zip';
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