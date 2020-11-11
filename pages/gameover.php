<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You lose</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gameover.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <audio id="audio" preload="auto" src="../sounds/lose.wav"></audio>
    <script src="../js/colorblindness.js"></script>
    <?php
    session_start();
    if ($_SESSION['endgame'] == "win") header("location:victory.php") ?>
</head>

<body>
    <header>
        <a href="../">
            <h2 title="(Alt + H)"><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./ranking.php">
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
    <p id="title">Game Over</p>
    <div class="box">
        <?php if ($_SESSION['survivalMode']) :?>
            <p id="text">You didn't pass the level.</p>
        <?php else :?>
            <p id="text">You didn't pass the <?= $_SESSION["actual_level"][0] ?> level</p>
        <?php endif; ?>
        <form action="../" method="post" id="form-home">
            <input title="(Alt + H)" type="submit" value="Home" accesskey="H" />
        </form>
        <form action="../functions.php" method="post" id="form-retry">
            <input title="(Alt + R)" type="submit" name="try-again" value="Try again" accesskey="R" />
        </form>
        <form action="../functions.php" method="post" id="form-save">
            <input title="(Alt + S)" type="submit" name="save" value="Save points" accesskey="S" />
        </form>
    </div>
    <?php if (!$_SESSION['survivalMode']) : ?>
        <footer>
            <p class="level-code">Code: <strong><?= $_SESSION['actual_level'][4] ?></strong></p>
        </footer>
    <?php endif; ?>
    <script src="../js/lose.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
