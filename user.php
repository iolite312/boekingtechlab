<?php
if ($_SESSION['user_level'] === 1) {
    header('Location: /admin');
} else {
    echo 2;
}
if ($_SESSION['user_level'] === 0) {
    echo 3;
} else {
    echo 4;
}
