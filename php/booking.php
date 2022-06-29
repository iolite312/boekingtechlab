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
	$roomselecter = $_POST['roomselecter'];

	if (
		empty($organization) ||
		empty($name) ||
		empty($email) ||
		empty($tel) ||
		empty($period) ||
		empty($roomselecter)
	) {
		$_SESSION['messages'][] = ["warning", 'Please fill all required fields!'];
		header('Location: /booking');
		exit;
	}
	echo $period;
	echo '<br>';
	print_r($period);
	// addbooking($organization, $name, $email, $tel, $period, $room);
} else {
	header("Location: /booking");
	exit;
}
