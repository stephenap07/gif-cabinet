<?php
	require('../app/common.php');
	require('../app/profile.php');

	// http://forums.devshed.com/php-faqs-stickies-167/program-basic-secure-login-system-using-php-mysql-891201.html

	if (!empty($_POST)) {
		if (empty($_POST['username'])) {
			die('username required');
		}

		if (empty($_POST['password'])) {
			die('password required');
		}
		
		$profileManager = new ProfileManager();
		$usernameStmt = $profileManager->queryByUsername($_POST['username']);
		if ($usernameStmt != TRUE) {
			die ('Error with SQL statement' . $profileManager->error());
		}
		if ($usernameStmt->num_rows > 0) {
			die ('This username is already registered');
		}

		$insertStmt = $profileManager->insertNew($_POST['username'], $_POST['password']);	
		if ($insertStmt == TRUE) {
			$insertOk = true;
		} else {
			die ('Failed to insert new profile');
		}

		header("Location: login.php"); 
		
		die();
	}
?>

<h1>Register</h1> 
<form action="register.php" method="post"> 
    Username:<br /> 
    <input type="text" name="username" value="" /> 
    <br /><br /> 
    Password:<br /> 
    <input type="password" name="password" value="" /> 
    <br /><br /> 
    <input type="submit" value="Register" /> 
</form>
