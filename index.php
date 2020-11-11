<html>

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simon-says</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <audio id="hoverAudio" preload="auto" src="sounds/hover.wav"></audio>
    <!--audio id="selectAudio" preload="auto" src="sounds/select.wav"></audio-->
</head>
<?php
session_start();
require_once('functions.php');
if (!isset($_SESSION['imposterMode'])) $_SESSION['imposterMode'] = false;
if (!isset($_SESSION['survivalMode'])) $_SESSION['survivalMode'] = false;
$username = isset($_SESSION["user"]) ? $_SESSION["user"] : '';
if (!isset($_SESSION["actual_level"])) {
    $_SESSION["imposterMode"] = false;
    $_SESSION["survivalMode"] =  false;
    $_SESSION["actual_level"] = get_level(0);
}
?>

<body>
    <header>
        <a href="." accesskey="H">
            <h2><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./pages/ranking.php" accesskey="T">
            <h2><i class="fas fa-medal"></i> RANKING</h2>
        </a>
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
        <div class="aside-menu" onclick="asideMenu();">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386 386" id="hamburger" data-asu="0">
                <path d="M1031.78,519.36m55.72-79.54c9.08,14.52,14,30.36,15,33a179.92,179.92,0,0,1,7.51,30.95,181,181,0,1,1-19.54-58.57c1.15,2.12,19.21,49.34-20.43,72.76a93.28,93.28,0,0,1-43,13H843" transform="translate(-738 -338)" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="24" class="circle"></path>
                <line x1="105" y1="131" x2="289" y2="131" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="24" class="line-1"></line>
                <line x1="105" y1="262" x2="289" y2="262" fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="24" class="line-2"></line>
            </svg>
        </div>
        <div class="navbar-page open-page-navbar">
            <a style="margin-top: 25%;" href="." accesskey="H">
                <h2><i class="fas fa-home"></i> HOME</h2>
            </a>
            <a href="./pages/ranking.php" accesskey="T">
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
                <?php if ($_SESSION['imposterMode']) : ?>
                    <input type="checkbox" name="imposterMode" checked id="imposterMode">
                <?php else : ?>
                    <input type="checkbox" name="imposterMode" id="imposterMode">
                <?php endif; ?>
            </div>
            <div class="form-option">
                <label for="survivalMode">Enable Survival mode</label>
                <?php if ($_SESSION['survivalMode']) : ?>
                    <input type="checkbox" name="survivalMode" checked id="survivalMode">
                <?php else : ?>
                    <input type="checkbox" name="survivalMode" id="survivalMode">
                <?php endif; ?>
            </div>
            <br>
            <button type="submit" value="Start game" href="index.html" accesskey="P"><i class="fas fa-play"></i> PLAY</button>
        </form>
    </div>
    <script src="js/index.js"></script>
    <script src="js/script.js"></script>
</body>

</html>