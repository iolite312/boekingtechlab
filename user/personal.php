<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['UId'])) {
	header('Location: /loginpage');
} else {
	if ($_SESSION['user_level'] === 1) {
		header('Location: /admin');
	}
}
$page = 'personal';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="icon" type="image/png" href="/assets/logo/LOGO.png" /> -->
	<title>Gebruikerspagina</title>

	<!-- Stylesheets -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="shortcut icon" href="./assets/images/placeholder.png" type="image/x-icon">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/alerts.css">
	<link rel="stylesheet" href="/css/user.css">

	<!-- Scripts -->
	<script src="/js/messagestimer.js" defer></script>
</head>

<body>
	<header>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
	</header>

	<main>
		<?php include_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/usersidebar.inc.php' ?>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>

		<section class="userinfo">
			<div>
				<form class="userinfoform" action="" method="post">
					<label for="name">Naam</label>
					<br>
					<input type="text" name="name" id="name">
					<br>
					<label for="email">Email</label>
					<br>
					<input type="email" name="email" id="email">
					<br>
					<label for="tel">Telefoonnummer</label>
					<br>
					<input type="tel" name="tel" id="tel">
					<br>
					<input type="submit">
				</form>
			</div>
		</section>

	</main>
</body>

</html>