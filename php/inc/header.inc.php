    <h1>Techlab Regius College</h1>
    <div class="btn">
    	<a class="<?php if ($page == 'home') {echo 'active';}; ?>" href="index.php">Home</a>
    	<a class="" href="#">Reserveren</a>
    	<a class="" href="booking">Booking</a>
    <?php if (isset($_SESSION['first_name'])) {
		echo
		"<li class='dropdown'>
				<a href='/myaccount' class='dropbtn'>placeholder ($_SESSION[first_name])</a>
				<div class='dropdown-content'>
					<a href='#'>placeholder</a>
					<a href='#'>placeholder</a>
					<a href='#'>placeholder</a>
					<a href='/php/logout'>Log out</a>
				</div>
			</li>";
	} else {
		if ($page == 'LoginPage') {
			$active = 'active';
		} else {
			$active = '';
		}
		echo $_SESSION['first_name'];
		echo
		"<a href='/loginpage' class='$active'>Login</a>";
	}
	?>
	</div>