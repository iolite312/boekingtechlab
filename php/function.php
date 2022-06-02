<?php
if (!isset($_SESSION)) {
	session_start();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/database/db_connection.php';

//check if email already exist in database
function uidExists($email)
{
	global $conn;

	$sql = "SELECT * FROM users WHERE email = ?;";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #101.1'];
		header('Location: /loginpage');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_bind_param($stmt, "s", $email)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #101.2'];
		header('Location: /loginpage');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_execute($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #101.3'];
		header('Location: /loginpage');
		mysqli_close($conn);
		exit;
	}

	if (!$result = mysqli_stmt_get_result($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #101.4'];
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
		$_SESSION['messages'][] = ["error", 'Error unknown #101.5'];
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
		$_SESSION['messages'][] = ["error", 'Error unknown #102.1'];
		header('Location: /loginpage');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_bind_param($stmt, "sssss", $firstname, $infixes, $lastname, $email, $hash)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #102.2'];
		header('Location: /loginpage');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_execute($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #102.3 - ' . mysqli_stmt_error($stmt)];
		header('Location: /loginpage');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_close($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #102.4'];
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
		$_SESSION['full_name'] = preg_replace('/\s+/', ' ', $uidExists["first_name"] . " " . $uidExists["infixes"] . " " . $uidExists["last_name"]);
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


function addbooking($organization_name, $organization_email, $organization_tel, $name, $email, $tel, $classroompart, $material, $time)
{
	global $conn;

	$sql = "INSERT INTO bookings VALUES (NULL,?,?,?,?,?,?,?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);

	if (isset($_SESSION['UId'])) {
		$userid = $_SESSION['UId'];
	} else {
		$userid = NULL;
	}

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #103.1'];
		header('Location: /booking');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_bind_param($stmt, "ssississs", $organization_name, $organization_email, $organization_tel, $name, $email, $tel, $classroompart, $material, $userid, $time)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #103.2'];
		header('Location: /booking');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_execute($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #103.3'];
		header('Location: /booking');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_close($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #103.4'];
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
		$_SESSION['messages'][] = ["error", 'Error unknown #104.1'];
		header('Location: /admin/booking');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_bind_param($stmt, "i", $bookingID)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #104.2'];
		header('Location: /admin/booking');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_execute($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #104.3'];
		header('Location: /admin/booking');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_close($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #104.4'];
		header('Location: /admin/booking');
		mysqli_close($conn);
		exit;
	}

	$_SESSION['messages'][] = ["success", 'your have successfully removed a booking!'];
	header('Location: /admin/booking');
	mysqli_close($conn);
	exit;
}

function removeaccount($accountID)
{
	global $conn;

	$sql = "DELETE FROM users WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #105.1'];
		header('Location: /admin/accounts');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_bind_param($stmt, "i", $accountID)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #105.2'];
		header('Location: /admin/accounts');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_execute($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #105.3'];
		header('Location: /admin/accounts');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_close($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #105.4'];
		header('Location: /admin/accounts');
		mysqli_close($conn);
		exit;
	}

	$_SESSION['messages'][] = ["success", 'your have successfully removed a account!'];
	header('Location: /admin/accounts');
	mysqli_close($conn);
	exit;
}

function fetchbooking()
{
	global $conn;
	if ($_SESSION['UId'] === 1) {
		$sql = "SELECT * FROM bookings AS B INNER JOIN users AS U ON B.account_id = U.id";
	} else {
		$sql = "SELECT B.id, B.classroompart, B.material, B.time FROM bookings AS B INNER JOIN users AS U ON B.account_id = U.id WHERE U.id = $_SESSION[UId]";
	}


	if ($row = mysqli_query($conn, $sql)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}

	mysqli_close($conn);
}

function addmaterials($name, $quantity_total, $take)
{
	global $conn;

	$sql = "INSERT INTO materials VALUES (NULL,?,?,NULL,?)";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #106.1'];
		header('Location: /booking');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_bind_param($stmt, "sii", $name, $quantity_total, $take)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #106.2'];
		header('Location: /booking');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_execute($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #106.3'];
		header('Location: /booking');
		mysqli_close($conn);
		exit;
	}

	if (!mysqli_stmt_close($stmt)) {
		$_SESSION['messages'][] = ["error", 'Error unknown #106.4'];
		header('Location: /booking');
		mysqli_close($conn);
		exit;
	}

	$_SESSION['messages'][] = ["success", 'Test123'];
	header('Location: /booking');
	mysqli_close($conn);
	exit;
}

function removematerials()
{
}

function fetchmaterials()
{
	global $conn;

	$sql = "SELECT * FROM materials";

	if ($row = mysqli_query($conn, $sql)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}

	mysqli_close($conn);
}

function fetchtimes()
{
	global $conn;

	$sql = "SELECT * FROM `date`";

	if ($row = mysqli_query($conn, $sql)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}

	mysqli_close($conn);
}

function fetchadmintimes()
{
	global $conn;

	$sql = "SELECT S.`id`, S.`period`, S.`time-from`, S.`time-until`, S.`period_type` FROM schedule AS S INNER JOIN days AS D on S.day_id = D.id";

	if ($row = mysqli_query($conn, $sql)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}

	mysqli_close($conn);
}
