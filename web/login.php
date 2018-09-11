<?php
session_start();

// Redirect if login session is set
if (isset($_SESSION['vHoveShop-login'])) {
	header("Location: index.php");
}

// Check if form was sent
if(isset($_POST['submit'])) {
	// Get form data
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	// Check form data
	if($user == "vHove" && $pass = "vHove123") {
		// Successful, set session and redirect
		$_SESSION['vHoveShop-login'] = true;
		header("Location: index.php");
	} else {
		// Not correct, show error
		echo "Falscher Login.";
	}
}
?>
<!DOCTYPE html>
  <html>
    <head>
    </head>
    <body>
		<h1>Login</h1>
		<p>Username: vHove<br />
			Passwort: vHove123</p>
			
		<form action="" method="post">
			Username: <input type="text" name="username" /><br />
			Passwort: <input type="password" name="password" /><br />
			<input type="submit" name="submit" value="Login" />
		</form>
    </body>
  </html>
