<?php
	require_once('../app/private.php');
	require_once('resources/config.php');
	require_once('../app/issue.php');
	require_once('../app/profile.php');

	$targetDir = $config['paths']['uploads'];
	$targetFile = $targetDir . basename(time());
	$uploadOk = 1;
	$image = $_FILES['myPhoto'];
	$imageFileType = pathinfo($image['name'], PATHINFO_EXTENSION);

	if ($image['error'] == UPLOAD_ERR_INI_SIZE) {
		die('File too large');
		$uploadOk = 0;
	}

	if (isset($_POST['submit'])) {
		$check = getimagesize($image['tmp_name']);
		if($check !== false) {
			echo 'File is an image - ' . $check['mime'] . '.';
			$uploadOk = 1;
		} else {
			echo 'File is not an image.';
			$uploadOk = 0;
		}
	}

	if ($imageFileType != 'gif' ) {
		echo 'Sorry, only GIF files are allowed.';
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		echo 'Sorry, your file was not uploaded.';
	} else {
		if (move_uploaded_file($image['tmp_name'], $targetFile)) {
			echo 'The file '. basename( $image['name']). ' has been uploaded.';
		} else {
			echo 'Sorry, there was an error uploading your file.';
		}
	}

	$profileManager = new ProfileManager();
	$result = $profileManager->queryByUsername(getLoginUsername());
	$profile = new Profile($result);

	if ($uploadOk) {
		$issueManager = new IssueManager();
		$insertResult = $issueManager->insertNew($targetFile, 'open', $_POST['author-name'], $_POST['issue-upload'], $profile->id());
		if ($insertResult == TRUE) {
			header('Location: index.php');
			die();
		}
	}
?>
