<?php
	require_once('../resources/config.php');

	$target_dir = $config['paths']['uploads'] . '/';
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	$uploadOk = 1;

	phpinfo();

	if(isset($_POST["submit"]) && isset($_FILES['fileToUpload'])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	} else {
			echo "Failed to load file";
			$uploadOk = 0;
	}

	if ($_FILES["fileToUpload"]["size"] > 500000) {
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
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
?>
