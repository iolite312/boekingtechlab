<?php
if ($_SESSION['user_level'] === 1) {
    echo 1;
} else {
    echo 2;
}
echo '<br>';
if ($_SESSION['user_level'] === 0) {
    echo 3;
} else {
    echo 4;
}
echo '<br>';

echo $_SESSION['user_level'];