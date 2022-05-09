<?php
if (!isset($_SESSION)) {
    session_start();
}
session_unset();
$_SESSION['messages'][] = ["success", 'You have successfully logged out!'];
header('Location: /apo_ahmad/MijnApo');
exit;
