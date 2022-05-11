<?php
if (!isset($_SESSION)) {
	session_start();
}
$page = 'reserveren'
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>booking</title>
	<!-- <link rel="icon" type="image/png" href="/assets/logo/LOGO.png" />
	<link rel="stylesheet" href="/css/booking.css">-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/alerts.css">
	<link rel="stylesheet" href="/css/booking.css">
	<script src="/js/expand_menu.js"></script>
</head>

<body>
	<header>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
	</header>

	<main>
		<section>
			<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>
		</section>

		<section class="booking">
			<!-- booking Form Start -->
			<div id="booking">
				<h2>Reserveren</h2>
				<form action="/php/booking.php" method="post" required>
					<label for="name">Organisatie</label>
					<input type="radio" name="ROC" checked><br>
					<select name="" id="rockopnh">
						<option value=""></option>
						<option value=""></option>
						<option value=""></option>
					</select>
					<input type="radio" name="regiuscollege"><br>
					<select name="" id="regius">
						<option value=""></option>
						<option value=""></option>
						<option value=""></option>
					</select>

					<!-- <label for="email">organisatie email</label> -->
					<input type="email" name="organization_email" placeholder="Email"><br>

					<!-- <label for="name">organisatie telefoon</label> -->
					<input type="tel" name="organization_tel" placeholder="Telefoon nummer"><br>

					<!-- <label for="email">email</label> -->
					<input type="email" name="email" placeholder="Email (required)"><br>

					<input type="submit" name="submit" value="Send">
				</form>
			</div>
			<!-- booking Form END -->
		</section>
	</main>
</body>

</html>