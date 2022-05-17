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
	<title>Booking</title>

	<!-- Stylesheets -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/alerts.css">
	<link rel="stylesheet" href="/css/booking.css">
	<link rel="stylesheet" href="/css/popup.css">

	<!-- Scripts -->
	<script src="/js/jquery.js" defer></script>
	<script src="/js/materials.js" defer></script>
	<script src="/js/messagestimer.js" defer></script>
	<script src="/js/pop-up.js" defer></script>
</head>

<body>
	<header>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
	</header>
		<!-- Pop Up -->
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/popup.inc.php' ?>

		<!-- Alerts -->
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>
	<main>
		<section class="booking">
			<!-- booking Form Start -->
			<div id="booking">
				<form action="/php/booking.php" method="post" required>
					<div class="questions">
						<h1>Reserveren</h1>
						<div class="userinput">
							<div class="organisation">
								<h3>Organisatie</h3>
								<select name="organisatie" id="organisatie">
									<option value="">Regius College</option>
									<option value="">ROC Kop van Noord-Holland</option>
									<option value="">Anders</option>
								</select><br>
								<label for="anders">Vul in als u "anders" selecteerd</label><br>
								<input type="text" name="anders" id="anders">
							</div>
							<div class="contact">
								<h3>Contact</h3>
								<label for="organization_email">Email</label><br>
								<input type="email" name="organization_email" placeholder="Email" <?php if ($_SESSION['FillData'] === "Yes") {echo 'value="'. $_SESSION["email"] .'"';}?>><br>
								<label for="organization_tel">Telefoon</label><br>
								<input type="tel" name="organization_tel" placeholder="Telefoon nummer"><br>
								<label for="organization_name">Naam</label><br>
								<input type="text" name="organization_name" placeholder="Naam" <?php if ($_SESSION['FillData'] === "Yes") {echo 'value="'. $_SESSION["first_name"] .''. $_SESSION["first_name"] .'"';}?>><br>
							</div>
						</div>
					</div>
					<div class="material-wrap">
						<h3>Materialen</h3>
						<div class="materials">
							<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/materials.inc.php'; ?>
						</div>
					</div>
					<input type="submit" name="submit" value="Versturen">
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