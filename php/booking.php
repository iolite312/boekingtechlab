<?php
if (!isset($_SESSION)) {
	session_start();
}

if (isset($_POST["submit"])) {


	//connect to functions.php
	require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';

	$organization = $_POST['organization'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$period = $_POST['period'];
	$room = $_POST['room'];

	if (
		empty($organization) ||
		empty($name) ||
		empty($email) ||
		empty($tel) ||
		empty($period) ||
		empty($room)
	) {
		$_SESSION['messages'][] = ["warning", 'Please fill all required fields!'];
		header('Location: /booking');
		exit;
	}

	addbooking($organization, $name, $email, $tel, $period, $room);
} else {
	header("Location: /booking");
	exit;
}
