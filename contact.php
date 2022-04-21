<?php $page = 'contact' ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact</title>
	<!-- <link rel="icon" type="image/png" href="/assets/logo/LOGO.png" />
	<link rel="stylesheet" href="/CSS/Contact.css">
	<script src="JS/showPassword.js"></script> -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/css/all.css">
</head> 

<body>
	<header>
		<?php #include $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
	</Header>

	<main>
		<section>
			<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>
		</section>

		<section class="contact">
			<!-- Contact Form Start -->
			<div id="contact">
				<h2>Contact</h2>
				<form action="/php/contact.php" method="post" required>
					<label for="name">organisatienaam:</label>
					<input type="text" name="organization_name" placeholder="Your full name (required)">

					<label for="email">organisatie email</label>
					<input type="email" name="organization_email" placeholder="Email (required)">

					<label for="name">organisatie telefoon</label>
					<input type="text" name="organization_tel" placeholder="Your tel num (required)">

					<label for="name">naam</label>
					<input type="text" name="name" placeholder="Your full name (required)">

					<label for="email">email</label>
					<input type="email" name="email" placeholder="Email (required)">

					<label for="name">telefoon</label>
					<input type="text" name="tel" placeholder="Your tel num (required)">

					<label for="Subject">lokaal deel</label>
					<input type="text" name="classroompart" placeholder="Subject (required)">
					
					<label for="Subject">materiaal</label>
					<input type="text" name="material" placeholder="Subject (required)">

					<label for="Message">tijd</label>
					<textarea id="Message" name="time" placeholder="Write your Message (required)" style="height:200px"></textarea>

					<input type="submit" name="submit" value="Send">
				</form>
			</div>
			<!-- Contact Form END -->
		</section>
	</main>
</body>

</html>