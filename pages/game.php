<!DOCTYPE html>
<html lang="en">
<!--
    TODO
    CREAR UNA CUENTA ATRAS PERSONALIZADA PARA EL MODO SUPERVIVENCIA
    EN EL CODE LEVEL ELIMINAR LOS ESPACIOS Y PONER UN UPPER CASE
    CREAR SEMINUEVO SISTEMA DE PUNTUACIÓN PARA SURVIVAL
    OCULTAR CODE LEVEL EN VICTORY Y GAMEOVER SI JUEGAS A SURVIVAL
    CREAR NUEVO ARCHIVO PARA EL RANKING DE SURVIVAL
    EN SAVE BTN SI ESTA EN SURVIVAL GUARDAR EN SU ARCHIVO
    CREAR NUEVO RANKING DE SURVIVAL
    HACER RESPONSIVE EL RANKING
    HACER RESPONSIVE EL GAME
    REVISAR EL RESPONSIVE DE LAS OTRAS PAGINAS
    CREAR UN SIDEMENU EN RESOLUCION MOBIL (SI DA TIEMPO)
    EASTER EGG: SI EN EL INPUT CODE INTRODUCE AMONGUS:BLUE EN EL RANKING APARACERA UNA FOTO DE DICHO PERSONAJE, EL NOMBRE Y LA PUNTUACIÓN
-->

<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/game.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <?php
    $isSurvival = $isImposter = false;
    $grid = $imposterSquares = $normalSquares = $secondsToShow = 0;
    $correctColor = $impostorColor = "";
    $randomNumbers = [];
    require_once("../functions.php"); // Import function files

    setImposterModeTrue();
    setSurvivalModeTrue();
    changeUserName();

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
    </header>

    <?php
    if ($isSurvival) require("modes/survival.php");
    else require("modes/campaign.php");
    ?>
    <script src="../js/game.js"></script>
</body>

</html>