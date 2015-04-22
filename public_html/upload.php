<?php
	require_once('resources/config.php');
	require_once('../app/issue.php');

	$targetDir = $config['paths']['uploads'] . '/';
	$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
	$uploadOk = 1;

	if(isset($_POST["submit"]) && isset($_FILES['fileToUpload'])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	} else {
			echo "Failed to load file";
			$uploadOk = 0;
	}

	/*
	if ($_FILES["fileToUpload"]["size"] > 2000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	if($imageFileType != "gif" ) {
		echo "Sorry, only GIFs allowed";
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	 */

	// Redirect back to homescreen

	if ($uploadOk) {
		$issueManager = new IssueManager();
		if ($issueManager->insertNew($targetFile, "open", "steve", "test description") == TRUE) {
			header("Location: http://cop4813.ccec.unf.edu/~group1/");
		}
	}

	die();
?>
