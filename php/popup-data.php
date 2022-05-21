<?php
if (!isset($_SESSION)) {
	session_start();
}

$_SESSION['FillData'] = "Yes";

header('Location: /booking.php');
