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
								<select name="organization" id="organization" class="someinput">
									<option value="Regius College">Regius College</option>
									<option value="ROC Kop van Noord-Holland">ROC Kop van Noord-Holland</option>
									<option value="Anders">Anders</option>
								</select><br>
								<label for="anders">Vul in als u "anders" selecteerd</label><br>
								<input type="text" name="anders" id="anders" class="someinput">
							</div>

							<div class="contact">
								<h3>Contact</h3>
								<label for="name">Naam</label><br>
								<input type="text" name="name" class="someinput" placeholder="Naam" value="<?php if (isset($_SESSION['UId'])) echo $_SESSION['full_name'] ?>"><br>
								<label for="email">Email</label><br>
								<input type="email" name="email" class="someinput" placeholder="Email" value=" <?php if (isset($_SESSION['UId'])) echo $_SESSION["email"] ?>"><br>
								<label for="tel">Telefoon</label><br>
								<input type="tel" name="tel" class="someinput" placeholder="Telefoon nummer"><br>
							</div>
						</div>
					</div>

					<div class="schedule">
						<h3>Time</h3>
						<input type="date" name="dateselecter" id="dateselecter" class="someinput" value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>">
						<div class="timestamp" id="timestamp">
							<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/php/inc/importtimes.inc.php' ?>
						</div>
					</div>

					<div class="room">
						<h3>Time</h3>
						<select name="room" id="room" class="someinput">
							<option value="1">room 1</option>
							<option value="2">room 2</option>
							<option value="3">room 3</option>
						</select><br>
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
		const someinput = document.getElementsByClassName('someinput');

		for (let i = 0; i < someinput.length; i++) {
			someinput[i].addEventListener('change', updatevalues);
		}

		if (sessionStorage.getItem("dateselecter")) {
			input.value = sessionStorage.getItem("dateselecter");
		};

		function updatevalues(event) {
			sessionStorage.setItem(event.target.name, event.target.value);
			if (event.target.name == 'dateselecter') {
				var url = new URL(window.location.href);
				url.searchParams.set('date', input.value)
				window.location.href = url;
			}
		}

		for (let i = 0; i < someinput.length; i++) {
			if (sessionStorage.getItem(someinput[i].name)) {
				someinput[i].value = sessionStorage.getItem(someinput[i].name)
			}
		}
	</script>

</body>

</html>