<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST["submit"]) && $_SESSION['user_level'] === 1) {

    //connect to functions.php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';


    $accountID = $_POST['accountID'];
    removebooking($accountID);
} else {
    header("Location: /admin/accounts");
    exit;
}
