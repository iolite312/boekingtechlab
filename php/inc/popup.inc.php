<?php

if (!isset($_SESSION)) {
	session_start();
}

if(isset($_SESSION['UId'])){
    if(!$_SESSION['FillData'] === "Yes"){
    echo '<div id="pop-up-container">
    <div id="pop-up">
        <div id="cross" onclick="ClosePopUp();">
            <img src="/assets/cross.svg" alt="My Happy SVG" />
        </div>
        <p>Het lijkt erop dat je al ingelogt bent, Wil je jouw gegevens invullen?</p>
        <div id="pop-up-buttons">
            <form id="pop-up-button" action="/php/popup-data.php" method="get">
                <input type="submit" id="pop-up-button-yes" class="pop-up-button" value="Yes">
            </form>
            <button class="pop-up-button" onclick="ClosePopUp();">No</button>
        </div>
    </div>
</div>';
    }
}
?>