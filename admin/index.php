<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION['user_level'] == 1) {
    exit;
} else {
    header('Location: /loginpage');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking</title>
    <!-- <link rel="icon" type="image/png" href="/assets/logo/LOGO.png" /> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/alerts.css">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="/js/expand_menu.js"></script>
</head>

<body>
    <header>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
    </header>

    <main>
        <section>
            <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>
        </section>

        <section>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoon</th>
                    <th>Organisatie</th>
                    <th>Lokaal</th>
                    <th>Materiaal</th>
                    <th>Tijd</th>
                    <th>Verwijderen</th>
                </tr>
                <?php include $_SERVER["DOCUMENT_ROOT"] . "/php/inc/importbooking.php" ?>
            </table>
        </section>
    </main>
</body>

</html>