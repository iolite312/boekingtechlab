<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['first_name'])) {
} else {
	if ($_SESSION['user_level'] === 0) {
		header('Location: /userpage');
	} else {
		header('Location: /admin');
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
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/booking.css">
	<link rel="stylesheet" href="/css/alerts.css">
	<link rel="stylesheet" href="/css/login.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<header>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
	</Header>

	<main>
		<section>
			<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>
		</section>

		<section class="loginpage">
			<!-- Login Form Start -->
			<div class="login">
				<h2>Login</h2>
				<form action="/php/login.php" method="post">
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
			<div class="signup">
				<h2>Sign Up</h2>
				<form action="/php/register.php" method="post">
					<input type="text" name="firstname" placeholder="Voornaam" required>
					<input type="text" name="infixes" placeholder="Tussenvoegsels">
					<input type="text" name="lastname" placeholder="Achternaam" required>
					<input type="email" name="email" placeholder="Email" required>
					<input id="Registerpassword" minlength="8" type="password" name="password" placeholder="Wachtwoord" required>
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