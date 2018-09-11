<?php
session_start();

// Redirect if login session is not set
if (!isset($_SESSION['vHoveShop-login'])) {
	header("Location: login.php");
}

?>