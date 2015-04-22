<?php
	// Start Session
	session_start();
	function isLoggedIn() {
		return !empty($_SESSION['user']);
	}

	function getLoginUsername() {
		return $_SESSION['user']['username'];
	}
?>
