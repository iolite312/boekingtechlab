<?php
if (!isset($_SESSION)) {
    session_start();
}
$page = 'home'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $page = 'home'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Techlab Regius College</title>

    <!-- Slideshow script -->
    <script src="js/slideshow.js" defer></script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/alerts.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/header.inc.php' ?>
    </header>

    <main>
        <section>
            <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/messages.inc.php' ?>
        </section>

        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci quod ab fuga amet nemo iste aliquam reprehenderit illo temporibus ullam! Cumque, facere quae? Unde, excepturi vero? Enim non rerum aliquid harum dignissimos?</p>
    </main>

    <footer>
        <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/footer.inc.php' ?>
    </footer>
</body>

</html>