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
        <div class="blindness" onclick='headerBlindness();'>
            <div class="switch-box">
                <label class="switch" title="deuteranopia">
                    <input id="chBoxHeader" type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <h2 title="deuteranopia">Colorblind Mode</h2>
        </div>
    </header>
    <aside>
        <h2 id="username"><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></h2>
        <div class="aside-menu" onclick="asideMenu();">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386 386" id="hamburger" data-asu="0">
                <path d="M1031.78,519.36m55.72-79.54c9.08,14.52,14,30.36,15,33a179.92,179.92,0,0,1,7.51,30.95,181,181,0,1,1-19.54-58.57c1.15,2.12,19.21,49.34-20.43,72.76a93.28,93.28,0,0,1-43,13H843" transform="translate(-738 -338)" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="24" class="circle"></path>
                <line x1="105" y1="131" x2="289" y2="131" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="24" class="line-1"></line>
                <line x1="105" y1="262" x2="289" y2="262" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="24" class="line-2"></line>
            </svg>
        </div>
        <div class="navbar-page open-page-navbar">
            <a style="margin-top: 25%;" href="../" accesskey="H">
                <h2><i class="fas fa-home"></i> HOME</h2>
            </a>
            <a href="./ranking.php" accesskey="T">
                <h2><i class="fas fa-medal"></i> RANKING</h2>
            </a>
            <div class="blindness" onclick='asideBlindness();'>
                <div class="switch-box">
                    <label class="switch" title="deuteranopia">
                        <input id="chBoxAside" type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
                <h2 title="deuteranopia">Colorblind Mode</h2>
            </div>
        </div>
    </aside>

    <?php
    if ($isSurvival) require("modes/survival.php");
    else require("modes/campaign.php");
    ?>

    <script src="../js/game.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>