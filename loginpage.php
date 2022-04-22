<?php
session_start();
if (!isset($_SESSION['first_name'])) {
} else {
	if ($_SESSION['user_level'] === 0) {
		header('Location: /userpage');
	} else {
		header('Location: /adminpage');
	}
}
$page = 'LoginPage'
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!-- <link rel="icon" type="image/png" href="/apo_ahmad/Assets/LOGO/LOGO.png" /> -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/css/all.css">
	<link rel="stylesheet" href="/css/loginpage.css">
	<!-- <script src="/apo_ahmad/JS/showPassword.js"></script> -->
</head>

<body>
	<header>
		<?php #include $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
	</Header>

	<main>
		<section>
			<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>
		</section>

		<section id="account">
			<!-- Login Form Start -->
			<div id="Login">
				<h2>Login</h2>
				<form action="/php/Login.php" method="post">
					<input type="email" name="email" placeholder="Email" required>
					<input id="Loginpassword" type="password" name="password" placeholder="Password" required>
					<div>
						<input type="checkbox" onclick="showPassword('Loginpassword')"><label for="ShowPassword">Show Password</label>
					</div>
					<input type="submit" name="submit" value="Login">
				</form>
			</div>
			<!-- Login Form Start -->
			<!-- Register Form Start -->
			<div id="SignUp">
				<h2>Sign Up</h2>
				<form action="/php/Register.php" method="post">
					<input type="text" name="firstname" placeholder="Firstname *" required>
					<input type="text" name="infixes" placeholder="Infixes">
					<input type="text" name="lastname" placeholder="Lastname *" required>
					<input type="email" name="email" placeholder="Email *" required>
					<input id="Registerpassword" type="password" name="password" placeholder="Password *" required>
					<div>
						<input type="checkbox" onclick="showPassword('Registerpassword')"><label for="ShowPassword">Show Password</label>
					</div>
					<ul id="passReq">
						<li>Passwords must be at least 8 characters long.</li>
						<li>Have at least 1 lower case letter [a-z]</li>
						<li>Have at least 1 upper case letter [A-Z]</li>
						<li>Have at least 1 numeric character [0-9]</li>
						<li>Have at least 1 special character: ~`!@#$%^&*()-_+={}[]|\;:"<>,./?</li>
					</ul>
					<input type="submit" name="submit" value="Register">
				</form>
				<p>* : Field is required!</p>
			</div>
			<!-- Register Form End -->
		</section>
	</main>
</body>

</html>