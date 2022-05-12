<?php
if (!$_SESSION['user_level'] == 1 || 0) {
    header('Location: /loginpage');
    exit;
}
echo "test";