<?php
echo $_SESSION['user_level'];
if ($_SESSION['user_level'] === 1)
echo 2;
exit;
if (isset($_POST["submit"]) && $_SESSION['user_level'] === 1) {

    //start database connection
    require_once $_SERVER["DOCUMENT_ROOT"] . '/database/db_connection.php';

    //connect to functions.php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    $bookingID = $_POST['bookingID'];
    removebooking($bookingID);

    //end database connection
    mysqli_close($conn);
} else {
    header("Location: /index");
    exit;
}
