<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You lose</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gameover.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <audio id="audio" preload="auto" src="../sounds/lose.wav"></audio>
    <?php
    session_start();
    if ($_SESSION['endgame'] == "win") header("location:victory.php")?>
</head>

<body>
    <header>
        <a href="../index.php">
            <h2 title="(Alt + H)"><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./ranking.php">
            <h2 title="(Alt + T)"><i class="fas fa-medal"></i> RANKING</h2>
        </a>
        <h2 id="username"><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></h2>
    </header>
    <p id="title">Game Over</p>
    <div class="box">
        <p id="text">You didn't pass the <?= $_SESSION["actual_level"][0] ?> level</p>
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
    <footer>
        <p class="level-code">Code: <strong><?= $_SESSION['actual_level'][4] ?></strong></p>
    </footer>
    <script src="../js/lose.js"></script>
</body>

</html>
