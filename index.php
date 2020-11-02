<html>

<head>
    <title>Simon-says</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
</head>
<?php
session_start();
require_once('functions.php');
if (!isset($_SESSION["actual_level"])) {
    $_SESSION["actual_level"] = get_level(0);
}
$username = isset($_SESSION['user']) ? $_SESSION['user'] : '';
?>

<body>
    <header>
        <a href="." accesskey="H">
            <h2 title="(Alt + H)"><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./pages/ranking.php" accesskey="T">
            <h2 title="(Alt + T)"><i class="fas fa-medal"></i> RANKING</h2>
        </a>
    </header>
    <div class="container">
        <img src="./img/Title.png" alt="Simon Says Title">
        <h2>Welcome to Simon says, the web version!</h2>
        <div class="instructions">
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

        <form id="form" action="pages/game.php" method="GET">
            <label for="uname">
                <h2>USERNAME</h2>
            </label>
            <input title="(Alt + U)" class="input-box" type="text" placeholder="Es el rosa" name="uname" value="<?= $username ?>" required accesskey="U" />
            <br>
            <button title="(Alt + P)" type="submit" value="Start game" href="index.html" accesskey="P"><i class="fas fa-play"></i> PLAY</button>
        </form>
    </div>
</body>

</html>