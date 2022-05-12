<?php
session_start();
if (isset($_SESSION['first_name'])) {
    if ($_SESSION['user_level'] === 1) {
        header('Location: /admin');
    }
} else {
    header('Location: /loginpage');
}
$page = 'user';
echo "test";
