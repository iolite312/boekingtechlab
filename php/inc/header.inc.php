<nav id="headernavigation" class="headernavigation">
    <ul id='expand-menu' onclick="togglemenu()"><span class="material-icons md-36">menu</span></ul>
    <ul id='btnContainer'>
        <li class='LOGO_li'>
            <a href='/apo_ahmad'><img src='/apo_ahmad/Assets/LOGO/LOGO.png' alt='LOGO' class='LOGO'></a>
        </li>
        <li><a class='btn' href='/index'>Home</a></li>
        <li><a class='btn' href='/booking'>boeking</a></li>
        <li><a class='btn' href='/placeholder'>placeholder</a></li>
        <li><a class='btn' href='/placeholder'>placeholder</a></li>
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
			if($page =='LoginPage'){$active = 'active';} else {$active='';}
			echo $_SESSION['first_name'];
			echo
			"<li><a href='/loginpage' class='btn dropbtn $active'>Login</a></li>";
		}
		?>
    </ul>
</nav>