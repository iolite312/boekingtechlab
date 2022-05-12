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
					<div class="organisatie">
						<h3>Organisatie</h3>
						<input id="ROC" type="radio" name="organisatie" value="ROC Kop van Noord-Holland" checked>
						<label for="ROC">ROC Kop van Noord-Holland</label><br>
						<input id="regiuscollege" type="radio" name="organisatie" value="Regius College">
						<label for="regiuscollege">Regius College</label><br>
						<select name="ROCKopNH" id="rockopnh">
							<option value="hofstraat">Schagen</option>
							<option value="denhelder">Den Helder</option>
						</select>
						<select name="RegiusCollege" id="regius">
							<option value="">Wilheminalaan</option>
							<option value="">Oranjelaan</option>
							<option value="">Emmalaan</option>
							<option value="">Hofstraat</option>
						</select>
					</div>
					<input type="email" name="organization_email" placeholder="Email"><br>

					<input type="tel" name="organization_tel" placeholder="Telefoon nummer"><br>

					<input type="email" name="email" placeholder="Email (required)"><br>

					<input type="submit" name="submit" value="Send">
				</form>
			</div>
			<!-- booking Form END -->
		</section>
	</main>
</body>

</html>