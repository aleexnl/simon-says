<!DOCTYPE html>
<html lang="en">
<!--
    CREAR UN SIDEMENU EN RESOLUCION MOBIL (SI DA TIEMPO)
-->

<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/game.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <?php
    if (!isset($_SESSION['imposterMode']) || !isset($_SESSION['survivalMode']))
        header('location:../');
    if (!isset($_SESSION['survivalCountdown'])) $_SESSION['survivalCountdown'] = 15;
    $isSurvival = $isImposter = false;
    $grid = $imposterSquares = $normalSquares = $secondsToShow = 0;
    $correctColor = $impostorColor = "";
    $randomNumbers = [];
    require_once("../functions.php"); // Import function files

    setImposterModeTrue();
    setSurvivalModeTrue();
    setUsername();
    resetDetails();

    getLevelFromCode();

    if ($_SESSION['survivalCountdown'] <= 0)
        resetPoints();

    if ($isSurvival) startSurvivalMode($isImposter);
    else startCampaignMode($isImposter);

    if ($isSurvival) echo "<title>Survival</title>";
    else echo "<title>" . $_SESSION["actual_level"][0] . " Level</title>";
    ?>
    <audio id="hoverAudio" preload="auto" src="../sounds/hover.wav"></audio>
    <audio id="selectAudio" preload="auto" src="../sounds/select.wav"></audio>
</head>

<body>
    <noscript>You need to enable JavaScript in your browser in order to play this game</noscript>
    <header>
        <a href="../index.php" accesskey="h">
            <h2 title="(Alt + H)"><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./ranking.php" accesskey="T">
            <h2 title="(Alt + T)"><i class="fas fa-medal"></i> RANKING</h2>
        </a>
        <h2 id="username"><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></h2>
        <label class="switch" title="deuteranopia">
            <input id="chBox" type="checkbox" onclick='deuteranopia();'>
            <span class="slider round"></span>
        </label>
        <h2 title="deuteranopia">Colorblind Mode</h2>
    </header>

    <?php
    if ($isSurvival) require("modes/survival.php");
    else require("modes/campaign.php");
    ?>

    <script src="../js/game.js"></script>
    <script src="../js/blindness.js"></script>
</body>

</html>