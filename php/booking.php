<?php
if (!isset($_SESSION)) {
	session_start();
}

if (isset($_POST["submit"])) {


	//connect to functions.php
	require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';

	$organization_name = $_POST['organization_name'];
	$organization_email = $_POST['organization_email'];
	$organization_tel = $_POST['organization_tel'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$classroompart = $_POST['classroompart'];
	$material = $_POST['material'];
	$time = $_POST['time'];

	if (
		empty($organization_name) ||
		empty($organization_email) ||
		empty($organization_tel) ||
		empty($name) ||
		empty($email) ||
		empty($tel) ||
		empty($classroompart) ||
		empty($material) ||
		empty($time)
	) {
		$_SESSION['messages'][] = ["warning", 'Please fill all required fields!'];
		header('Location: /booking');
		exit;
	}

	addbooking($organization_name, $organization_email, $organization_tel, $name, $email, $tel, $classroompart, $material, $time);
} else {
	header("Location: /booking");
	exit;
}
