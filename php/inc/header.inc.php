<h1>Techlab Regius College</h1>
<div class="btn">
	<a class="<?php if ($page == 'home') {echo 'active';} ?>" href="/index">Home</a>
	<a class="<?php if ($page == 'reserveren') {echo 'active';} ?>" href="/booking">Reserveren</a>
	<?php
	if (!isset($_SESSION['first_name'])) {
		if ($page == 'login') {$active = 'active';}
		echo "
		<a class='$active'href='/loginpage'>Login</a>
		";
	} else {
		if ($page == 'user' || $page == 'admin') {$active = 'active';}
		echo "
		<a class='$active'href='/user'>User</a>
		";
	}
	?>
</div>