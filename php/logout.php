<?php
if (!isset($_SESSION)) {
	session_start();
}

session_unset();

$_SESSION['messages'][] = ["success", 'U bent succesvol uitgelogd!'];
header('Location: /loginpage');
exit;
