<img class="logo" src="/assets/TechlabLogo.svg" alt="">
<div class="btn">
	<a class="<?php if ($page == 'home') {echo 'active';} ?>" href="/index">Home</a>
	<a class="<?php if ($page == 'reserveren') {echo 'active';} ?>" href="/booking">Reserveren</a>
	<?php
	if (!isset($_SESSION['UId'])) {
		$page == 'login' ? $active = 'active' : $active = "";
		echo "
		<a class='$active' href='/loginpage'>Inloggen</a>
		";
	} else {
		if ($page == 'user' || $page == 'admin') {
			$active = 'active';
			echo "<a class='$active' href='/php/logout'>Uitloggen</a>";
		} else {
			echo "<a class='$active' href='/user'>Gebruiker</a>";
		}
	}
	?>
</div>