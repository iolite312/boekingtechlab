<?php
if (isset($_POST["submit"])) {

    //connect to functions.php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    //get user data from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (
        empty($email) ||
        empty($password)
    ) {
        $_SESSION['messages'][] = ["warning", 'Please fill all required fields!'];
        header('Location: /loginpage.php');
        exit;
    }

    //log user in
    loginUser($email, $password);
} else {
    header("Location: /");
    exit;
}
