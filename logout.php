<?php
	require("../app/common.php"); 
	unset($_SESSION['user']); 
	header("Location: login.php"); 
	die("Redirecting to: login.php");
?>
