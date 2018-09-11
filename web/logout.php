<?php
session_start();

// Check if session is set
if (isset($_SESSION['vHoveShop-login'])) {
	// delete session for user
	unset($_SESSION['vHoveShop-login']);
}

// Redirect to login
header("Location: login.php");
?>