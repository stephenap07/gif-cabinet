<?php
	require('../app/common.php');
	require('../app/profile.php');

	if (!empty($_POST)) {
		$loginOK = false;
		$profileManager = new ProfileManager();	
		$queryResult = $profileManager->queryByUsername($_POST['username']);
		$profile = null;

		if ($queryResult->num_rows > 0) {
			$profile = new Profile($queryResult);
		}

		if ($profile->isCorrectPassword($_POST['password'])) {
			$loginOK = true;
		}

		if ($loginOK) {
			$_SESSION['user'] = $profile->queryData();
			header("Location: index.php"); 
			die("redirecting to index.php");
		}
	}
?>

<h1>Login</h1> 
<form action="login.php" method="post"> 
    Username:<br /> 
    <input type="text" name="username" value="<?php echo $submitted_username = ""; ?>" /> 
    <br /><br /> 
    Password:<br /> 
    <input type="password" name="password" value="" /> 
    <br /><br /> 
    <input type="submit" value="Login" /> 
</form> 
<a href="register.php">Register</a>
