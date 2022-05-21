<?php
if (!isset($_SESSION)) {
	session_start();
}

if (isset($_POST["submit"])) {

	//connect to functions.php
	require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';


	//get user data from form
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (
		empty($email) ||
		empty($password)
	) {
		$_SESSION['messages'][] = ["warning", 'Vul alstublieft alle verplichte velden in!'];
		header('Location: /loginpage');
		exit;
	}

	//log user in
	loginUser($email, $password);
} else {
	header("Location: /index");
	exit;
}
