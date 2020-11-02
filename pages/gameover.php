<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You lose</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gameover.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    if ($_SESSION['endgame'] == "win") header("location:victory.php")
    ?>
</head>

<body>
    <header>
        <a href="../">
            <h2><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./ranking.php">
            <h2><i class="fas fa-medal"></i> RANKING</h2>
        </a>
        <h2 id="username"><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></h2>
    </header>
    <p id="title">Game Over</p>
    <div class="box">
        <p id="text">You didn't pass the <?= $_SESSION["actual_level"][0] ?> level</p>
        <p id="text"><small>Level code: <code><?= $_SESSION["actual_level"][4] ?></code></small></p>
        <form action="../" method="post" id="form-home">
            <input type="submit" value="Home" accesskey="H" />
        </form>
        <form action="game.php" method=" post" id="form-retry">
            <input type="submit" value="Try again" accesskey="R" />
        </form>
    </div>
    <footer>
        <p class="level-code">Code: <strong><?= $_SESSION['actual_level'][4] ?></strong></p>
    </footer>
</body>

</html>