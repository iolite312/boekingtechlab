<?php
if (!$_SESSION['user_level'] == 0) {
    header('Location: /loginpage');
    exit;
}
echo "test";