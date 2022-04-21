<?php
if (isset($_POST["submit"])) {

    //connect to functions.php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/boekingtechlab/php/functions.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    //get user data from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $Subject = $_POST['Subject'];
    $Message = $_POST['Message'];

    if (
        empty($name) ||
        empty($email) ||
        empty($Subject) ||
        empty($Message)
    ) {
        $_SESSION['messages'][] = ["warning", 'Please fill all required fields!'];
        header('Location: /boekingtechlab/Contact.php');
        exit;
    }

    //log user in
    sendForm($name, $email, $Subject, $Message);
} else {
    header("Location: /boekingtechlab/Contact.php");
    exit;
}
