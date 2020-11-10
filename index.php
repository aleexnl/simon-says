<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simon-says</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <audio id="hoverAudio" preload="auto" src="sounds/hover.wav"></audio>
    <audio id="selectAudio" preload="auto" src="../sounds/select.wav"></audio>
</head>
<?php
session_start();
require_once('functions.php');
$_SESSION["survivalMode"] =  false;
$username = isset($_SESSION["user"]) ? $_SESSION["user"] : '';
if (!isset($_SESSION["actual_level"])) {
    $_SESSION["imposterMode"] = false;
    $_SESSION["actual_level"] = get_level(0);
}
?>

<body>
    <header>
        <a href="." accesskey="H">
            <h2><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./pages/ranking.php" accesskey="T">
            <h2><i class="fas fa-medal"></i>RANKING</h2>
        </a>
    </header>
    <div class="content">
        <div class="image">
            <img src="./img/Title.png" alt="Simon Says Title">
        </div>
        <div class="instructions">
            <h1>Welcome to Simon says, the web version!</h1>
            <h2>INSTRUCTIONS</h2>
            <h3>In order to win, you have to select all the correct squares</h3>
            <ol>
                <li>Introduce an username to play.</li>
                <li>When you start, you'll see a gameboard with squares.</li>
                <li>When you press start, the solution squares will glow for a short time.</li>
                <li>After that time, they'll disapear and you'll have to remember the once who glowed.</li>
                <li>After selection the squares, press resolve to guess if you won or lost.</li>
                <li>If you won, you can go to the next level, else you can repeat or leave.</li>
            </ol>
            <h3>Complete all the levels in the shortest time to score more points!</h3>
        </div>

        <form id="form" action="pages/game.php" method="POST">
            <input type="hidden" name="page" value="index">
            <div class="form-option">
                <label for="uname">
                    <h2>Username</h2>
                </label>
                <input title="(Alt + U)" class="input-box" type="text" placeholder="Es el rosa" name="uname" value="<?= $username ?>" required accesskey="U" />
                <input title="(Alt + C)" class="input-box input-code-lvl" type="text" placeholder="Code lvl" name="code" accesskey="C" />
            </div>
            <div class="form-option">
                <label for="imposterMode">Enable Imposter mode</label>
                <input type="checkbox" name="imposterMode" id="imposterMode">
            </div>
            <div class="form-option">
                <label for="survivalMode">Enable Survival mode</label>
                <input type="checkbox" name="survivalMode" id="survivalMode">
            </div>
            <br>
            <button type="submit" value="Start game" href="index.html" accesskey="P"><i class="fas fa-play"></i> PLAY</button>
        </form>
    </div>
    <script src="js/index.js"></script>
</body>

</html>