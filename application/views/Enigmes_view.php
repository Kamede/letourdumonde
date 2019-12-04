<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <title>L'aventure !</title>
</head>
<body style="overflow: hidden">

<div id="popup">
    <p id="popup-text"></p>
    <button id="popup-button"></button>
</div>
<div class="dim"></div>
<div id="viewer">
    <p id="viewer-puzzle"></p>
    <img id="viewer-fullscreen" src="assets/images/viewer/icons/aspect_ratio-24px.svg">
    <div id="viewer-textbox-wrapper">
        <p id="viewer-textbox-name"></p>
        <div id="viewer-textbox">
        </div>
        <div id="viewer-tips">
        </div>
        <div id="viewer-answer">
            <form>
                <span>
                    <input name="1" class="inputs" type="text" pattern="[0-9]" maxlength="1">
                    <input name="2" class="inputs" type="text" pattern="[0-9]" maxlength="1">
                    <input name="3" class="inputs" type="text" pattern="[0-9]" maxlength="1">
                    <input name="4" class="inputs" type="text" pattern="[0-9]" maxlength="1">
                </span>
                <input type="submit" value="Valider">
            </form>
        </div>
    </div>
    <img class="character" id="character-main" src="assets/images/viewer/characters/Toi.gif"/>
    <img class="character" id="character-scnd">
</div> <!-- viewer -->
<div>
  <p><audio src="assets/audio/1.mp3" controls id="player"></audio></p>
</div>

<script type="text/javascript" src="scripts/enigmes.js"></script>
</body>
</html>
