<img class="logo" src="/assets/TechlabLogo.svg" alt="">
<div class="btn">
	<a class="<?php if ($page == 'home') {echo 'active';} ?>" href="/index">Home</a>
	<a class="<?php if ($page == 'reserveren') {echo 'active';} ?>" href="/booking">Reserveren</a>
	<?php
	if (!isset($_SESSION['first_name'])) {
		if ($page == 'login') $active = 'active';
		echo "
		<a class='$active'href='/loginpage'>Login</a>
		";
	} else {
		if ($page == 'user' || $page == 'admin') $active = 'active';
		if ($page == 'user' || $page == 'admin') {
			echo "<a class='$active'href='/php/logout'>Uitloggen</a>";
		} else {
			echo "<a class='$active'href='/user'>Gebruiker</a>";
		}
	}
	?>
</div>
<?php
print_r($_SERVER['COMPUTERNAME']);
print_r($_SERVER['USERNAME']);