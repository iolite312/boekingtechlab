<?php
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['first_name'])) {
	if ($_SESSION['user_level'] === 0) {
		header('Location: /user');
	} else {
		header('Location: /admin');
	}
}
$page = 'login'
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inloggen</title>

	<!-- Stylesheets -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/booking.css">
	<link rel="stylesheet" href="/css/alerts.css">
	<link rel="stylesheet" href="/css/login.css">

	<!-- Scripts -->
	<script src="/js/showPassword.js" defer></script>
	<script src="/js/messagestimer.js" defer></script>
</head>

<body>
	<header>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
	</Header>

	<main>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>

		<section class="loginpage">
			<!-- Login Form Start -->
			<div class="login">
				<h2>Inloggen</h2>
				<form action="/php/login.php" method="post">
					<input type="email" name="email" placeholder="Email" required>
					<input id="Loginpassword" type="password" name="password" placeholder="Wachtwoord" required>
					<div style="display:flex; flex-direction:row-reverse;">
						<input type="checkbox" onclick="showPassword('Loginpassword')"><label for="ShowPassword">Toon wachtwoord</label>
					</div>
					<input type="submit" name="submit" value="Inloggen">
				</form>
			</div>
			<!-- Login Form Start -->
			<!-- Register Form Start -->
			<div class="signup">
				<h2>Registreren</h2>
				<form action="/php/register.php" method="post">
					<input type="text" name="firstname" placeholder="Voornaam*" required>
					<input type="text" name="infixes" placeholder="Tussenvoegsels">
					<input type="text" name="lastname" placeholder="Achternaam*" required>
					<input type="email" name="email" placeholder="Email*" required>
					<input id="Registerpassword" minlength="8" type="password" name="password" placeholder="Wachtwoord*" required>
					<div style="display: flex;flex-direction: row-reverse;">
						<input type="checkbox" onclick="showPassword('Registerpassword')"><label for="ShowPassword">Toon wachtwoord</label>
					</div>
					<ul id="passReq">
						<li>Wachtwoorden moeten minimaal 8 tekens lang zijn.</li>
						<li>Minimaal 1 kleine letter [a-z] hebben.</li>
						<li>Minimaal 1 hoofdletter [A-Z] hebben.</li>
						<li>Minimaal 1 cijferteken hebben [0-9].</li>
						<li>Minimaal 1 speciaal teken hebben: ~`!@#$%^&*()-_+={}[]|\;:"<>,./?</li>
					</ul>
					<input type="submit" name="submit" value="Registreren">
				</form>
				<p>* : Veld is verplicht!</p>
			</div>
			<!-- Register Form End -->
		</section>
	</main>
	<footer>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/footer.inc.php' ?>
	</footer>
</body>

</html>