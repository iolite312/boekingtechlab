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
    <!-- <link rel="icon" type="image/png" href="/assets/logo/LOGO.png" /> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/alerts.css">
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
                    <th>Organisatie</th>
                    <th>Lokaal</th>
                    <th>Materiaal</th>
                    <th>Tijd</th>
                    <th>Verwijderen</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>menner hello</td>
                    <td>email@email.com</td>
                    <td>ROC</td>
                    <td>Lokaal 1</td>
                    <td>PC en VR</td>
                    <td>12:30-01:30</td>
                    <td><button type="submit">Delete</button></td>
                </tr>
            </table>
        </section>
    </main>
</body>

</html>