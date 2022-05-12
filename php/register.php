<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST["submit"])) {

    //connect to functions.php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';


    //get user data from form
    $firstname = $_POST['firstname'];
    $infixes = $_POST['infixes'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //check if all fields are filled
    if (
        empty($firstname) ||
        empty($lastname) ||
        empty($email) ||
        empty($password)
    ) {
        $_SESSION['messages'][] = ["warning", 'Please fill all required fields!'];
        header('Location: /login');
        exit;
    }

    //password requirements
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    // Validate password strength
    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $_SESSION['messages'][] = ["warning", 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.'];
        header('Location: /loginpage');
        exit;
    }

    //check if email is already in use
    if (uidExists($email) !== false) {
        $_SESSION['messages'][] = ["warning", 'email used'];
        header('Location: /loginpage');
        exit;
    }

    createuser($firstname, $infixes, $lastname, $email, $password);
} else {
    header("Location: /index");
    exit;
}
