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
				<h1>Reserveren</h1>
				<form action="/php/booking.php" method="post" required>
					<div class="questions">
						<div class="organisation">
							<h3>organisatie</h3>
							<select name="organisatie" id="organisatie">
								<option value="">Regius College</option>
								<option value="">ROC Kop van Noord-Holland</option>
								<option value="">Anders</option>
							</select>
							<label for="anders">Vul in als u "anders" selecteerd</label><br>
							<input type="text" name="anders" id="anders">
						</div>
						<div class="contact">
							<h3>Contact</h3>
							<input type="email" name="organization_email" placeholder="Email"><br>
							<input type="tel" name="organization_tel" placeholder="Telefoon nummer"><br>
							<input type="email" name="email" placeholder="Email (required)"><br>
						</div>
					</div>
					<div class="materials">
						<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/materials.php' ;?>
					</div>
					<input type="submit" name="submit" value="Send">
				</form>
			</div>
			<!-- booking Form END -->
		</section>
	</main>
	<footer>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/footer.inc.php' ?>
	</footer>
</body>

</html>