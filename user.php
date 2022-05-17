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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/png" href="/assets/logo/LOGO.png" /> -->
    <title>Gebruikerspagina</title>

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/alerts.css">
    <link rel="stylesheet" href="/css/admin.css">

    <!-- Scripts -->
    <script src="/js/messagestimer.js" defer></script>
</head>

<body>
    <header>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
    </header>

    <main>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>

        <section>
            <table class="bookings">
                <tr>
                    <th>#</th>
                    <th>Lokaal</th>
                    <th>Materialen</th>
                    <th>Tijd</th>
                    <th>Acties</th>
                </tr>
                <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/importuserbookings.inc.php' ?>
            </table>
        </section>

    </main>
</body>

</html>