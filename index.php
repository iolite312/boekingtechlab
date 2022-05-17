<?php
if (!isset($_SESSION)) {
    session_start();
}
$page = 'home'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Techlab Regius College</title>

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/alerts.css">
    <link rel="stylesheet" href="/css/index.css">

    <!-- Scripts -->
    <script src="/js/slideshow.js" defer></script>
    <script src="/js/messagestimer.js" defer></script>
</head>

<body>
    <header>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
    </header>

    <main>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>

        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/indexcontent.inc.php' ?>
    </main>

    <footer>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/footer.inc.php' ?>
    </footer>
</body>

</html>