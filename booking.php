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
	<link rel="shortcut icon" href="./assets/images/placeholder.png" type="image/x-icon">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/alerts.css">
	<link rel="stylesheet" href="/css/booking.css">

	<!-- Scripts -->
	<script src="/js/jquery.js" defer></script>
	<script src="/js/materials.js" defer></script>
	<script src="/js/messagestimer.js" defer></script>
</head>

<body>
	<header>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
	</header>

	<main>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>
		<section class="booking">
			<!-- booking Form Start -->
			<div id="booking">

				<form action="/php/booking.php" method="post" required>
					<div class="questions">
						<h1>Reserveren V23</h1>
						<div class="userinput">
							<div class="organisation">
								<h3>Organisatie</h3>
								<select name="organisatie" id="organisatie" class="someinput">
									<option value="1">Regius College</option>
									<option value="2">ROC Kop van Noord-Holland</option>
									<option value="3">Anders</option>
								</select><br>
								<label for="anders">Vul in als u "anders" selecteerd</label><br>
								<input type="text" name="anders" id="anders" class="someinput">
							</div>

							<div class="contact">
								<h3>Contact</h3>
								<label for="organization_name">Naam</label><br>
								<input type="text" name="organization_name" class="someinput" placeholder="Naam" value="<?php if (isset($_SESSION['UId'])) echo $_SESSION['full_name'] ?>"><br>
								<label for="organization_email">Email</label><br>
								<input type="email" name="organization_email" class="someinput" placeholder="Email" value=" <?php if (isset($_SESSION['UId'])) echo $_SESSION["email"] ?>"><br>
								<label for=" organization_tel">Telefoon</label><br>
								<input type="tel" name="organization_tel" class="someinput" placeholder="Telefoon nummer"><br>
							</div>
						</div>
					</div>

					<div class="schedule">
						<h3>Time</h3>
						<input id="dateselecter" type="date" value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>">
						<div class="timestamp" id="timestamp">
							<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/php/inc/importtimes.inc.php' ?>
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

	<script>
		const input = document.getElementById('dateselecter');
		if (localStorage.getItem("dateselecter")) {
			input.value = localStorage.getItem("dateselecter");
		};

		input.addEventListener('change', function() {
			sessionStorage.setItem("dateselecter", input.value);
			var url = new URL(window.location.href);
			url.searchParams.set('date', input.value)
			// url.searchParams.set('date', input.value)
			// url.searchParams.set('date', input.value)
			// url.searchParams.set('date', input.value)
			window.location.href = url;
		});
	</script>

</body>

</html>