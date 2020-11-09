<!DOCTYPE html>
<html lang="en">
<!--
    TODO
    PONER QUE LOS COLORES DE SURVIVAL MODE SEAN RANDOMS
    CREAR UNA CUENTA ATRAS PERSONALIZADA PARA EL MODO SUPERVIVENCIA
    EN EL CODE LEVEL ELIMINAR LOS ESPACIOS
    CREAR SEMINUEVO SISTEMA DE PUNTUACIÓN PARA SURVIVAL
    OCULTAR CODE LEVEL EN VICTORY Y GAMEOVER SI JUEGAS A SURVIVAL
    CREAR NUEVO ARCHIVO PARA EL RANKING DE SURVIVAL
    EN SAVE BTN SI ESTA EN SURVIVAL GUARDAR EN SU ARCHIVO
    CREAR NUEVO RANKING DE SURVIVAL
    HACER RESPONSIVE EL RANKING
    HACER RESPONSIVE EL GAME
    REVISAR EL RESPONSIVE DE LAS OTRAS PAGINAS
    CREAR UN SIDEMENU EN RESOLUCION MOBIL (SI DA TIEMPO)
-->

<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION["actual_level"][0] ?> Level</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/game.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <style>
        .wrong {
            background-color: red;
        }
    </style>
    <?php
    $isSurvival = $isImposter = false;
    $grid = $imposterSquares = $normalSquares = 0;
    $randomNumbers = [];
    require_once("../functions.php"); // Import function files

    setImposterModeTrue();
    setSurvivalModeTrue();
    changeUserName();

    if ($isSurvival) startSurvivalMode($isImposter);
    else startCampaignMode($isImposter);

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
        <label class="switch">
            <input id="chBox" type="checkbox" onclick='colorControl();'>
            <span class="slider round"></span>
        </label>
        <h2>Colorblind mode</h2>
    </header>

    <?php
    if ($isSurvival) require("modes/survival.php");
    else require("modes/campaign.php");
    ?>
          
    <script src="../js/game.js"></script>
    <script src="../js/colorblindness.js"></script>
</body>

</html>