<?php
if (!isset($_SESSION)) {
    session_start();
}

//start database connection
require_once $_SERVER["DOCUMENT_ROOT"] . '/database/db_connection.php';

//check if email already exist in database
function uidExists($email)
{
    global $conn;

    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #101.1'];
        header('Location: /loginpage');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_bind_param($stmt, "s", $email)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #101.2'];
        header('Location: /loginpage');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_execute($stmt)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #101.3'];
        header('Location: /loginpage');
        mysqli_close($conn);
        exit;
    }

    if (!$result = mysqli_stmt_get_result($stmt)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #101.4'];
        header('Location: /loginpage');
        mysqli_close($conn);
        exit;
    }

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    if (!mysqli_stmt_close($stmt)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #101.4'];
        header('Location: /loginpage');
        mysqli_close($conn);
        exit;
    }

    mysqli_close($conn);
}


function createuser($firstname, $infixes, $lastname, $email, $password)
{
    global $conn;

    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

    //send user data to database
    $sql = "INSERT INTO users VALUES (NULL,?,?,?,?,?,DEFAULT,current_timestamp(),DEFAULT)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #102.1'];
        header('Location: /loginpage');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_bind_param($stmt, "sssss", $firstname, $infixes, $lastname, $email, $hash)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #102.2'];
        header('Location: /loginpage');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_execute($stmt)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #102.3 - ' . mysqli_stmt_error($stmt)];
        header('Location: /loginpage');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_close($stmt)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #102.4'];
        header('Location: /loginpage');
        mysqli_close($conn);
        exit;
    }

    $_SESSION['messages'][] = ["success", 'You have successfully sign up!'];
    header('Location: /loginpage');
    mysqli_close($conn);
    exit;
}


function loginUser($email, $password)
{
    $uidExists = uidExists($email);

    if ($uidExists === false) {
        $_SESSION['messages'][] = ["warning", 'Wrong Email or Password!'];
        header('Location: /loginpage');
        exit;
    }

    $pwdhashed = $uidExists["password"];
    $checkpwd = password_verify($password, $pwdhashed);

    if ($checkpwd === false) {
        $_SESSION['messages'][] = ["warning", 'Wrong Email or Password!'];
        header('Location: /loginpage');
        exit;
    } else if ($checkpwd === true) {
        $_SESSION['UId'] = $uidExists["id"];
        $_SESSION['first_name'] = $uidExists["first_name"];
        $_SESSION['infixes'] = $uidExists["infixes"];
        $_SESSION['last_name'] = $uidExists["last_name"];
        $_SESSION['email'] = $uidExists["email"];
        $_SESSION['user_level'] = $uidExists["user_level"];
        $_SESSION['date_created'] = $uidExists["date_created"];
        $_SESSION['status'] = $uidExists["status"];

        if (!$_SESSION['user_level'] === 1) {
            $_SESSION['messages'][] = ["success", 'You have successfully logged in'];
            header('Location: /user');
            exit;
        } else {
            $_SESSION['messages'][] = ["success", 'You have successfully logged in as a admin user'];
            header('Location: /admin');
            exit;
        }
    }
}


function sendForm($organization_name, $organization_email, $organization_tel, $name, $email, $tel, $classroompart, $material, $time)
{
    global $conn;

    $sql = "INSERT INTO bookings VALUES (NULL,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #103.1'];
        header('Location: /booking');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_bind_param($stmt, "ssississs", $organization_name, $organization_email, $organization_tel, $name, $email, $tel, $classroompart, $material, $time)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #103.2'];
        header('Location: /booking');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_execute($stmt)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #103.3'];
        header('Location: /booking');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_close($stmt)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #103.4'];
        header('Location: /booking');
        mysqli_close($conn);
        exit;
    }

    $_SESSION['messages'][] = ["success", 'your message was successfully sent!'];
    header('Location: /booking');
    mysqli_close($conn);
    exit;
}

function removebooking($bookingID)
{
    global $conn;

    $sql = "DELETE FROM bookings WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #104.1'];
        header('Location: /admin/index');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_bind_param($stmt, "i", $bookingID)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #104.2'];
        header('Location: /admin/index');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_execute($stmt)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #104.3'];
        header('Location: /admin/index');
        mysqli_close($conn);
        exit;
    }

    if (!mysqli_stmt_close($stmt)) {
        $_SESSION['messages'][] = ["error", 'Error unkown #104.4'];
        header('Location: /admin/index');
        mysqli_close($conn);
        exit;
    }

    $_SESSION['messages'][] = ["success", 'your have successfully removed a booking!'];
    header('Location: /admin/index');
    mysqli_close($conn);
    exit;
}
