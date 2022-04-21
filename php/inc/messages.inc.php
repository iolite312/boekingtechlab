<?php

if (empty($_SESSION['messages'])) {
    return;
}

$messages = $_SESSION['messages'];
unset($_SESSION['messages']);
?>
<ul>
    <?php foreach ($messages as $message) :
        switch ($message[0]) {
            case "error":
    ?>
                <div class="errorContainer">
                    <span class="material-icons md-48">dangerous</span>
                    <h2><?php echo $message[1]; ?></h2>
                </div>
            <?php
                break;
            case "warning":
            ?>
                <div class="warningContainer">
                    <span class="material-icons md-48">warning</span>
                    <h2><?php echo $message[1]; ?></h2>
                </div>
            <?php
                break;
            case "success":
            ?>
                <div class="successContainer">
                    <span class="material-icons md-48">done</span>
                    <h2><?php echo $message[1]; ?></h2>
                </div>
            <?php
                break;
            default:
            ?>
                <div class="errorContainer">
                    <span class="material-icons md-48">error</span>
                    <h2><?php echo "code " . "\"" . $message[0] . "\"" . " is unknown"; ?></h2>
                </div>
        <?php
                break;
        }
        ?>
    <?php endforeach; ?>
</ul>