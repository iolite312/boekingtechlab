<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking</title>
    <!-- <link rel="icon" type="image/png" href="/assets/logo/LOGO.png" />
	<link rel="stylesheet" href="/css/booking.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/alerts.css">
    <script src="/js/expand_menu.js"></script>
</head>

<body>
    <header>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/adminpage/php/inc/adheader.inc.php' ?>
    </header>

    <main>
        <section>
            <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>
        </section>

        hello there
    </main>
</body>

</html>