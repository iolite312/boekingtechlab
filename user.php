<?php
if (isset($_SESSION['first_name'])) {
    if (!$_SESSION['user_level'] === 0) {
        header('Location: /admin');
    } exit;
} else {
    header('Location: /loginpage');
}
$page = 'user';
echo "test";
