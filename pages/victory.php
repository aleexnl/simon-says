<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Win</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/victory.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <?php session_start();
    require_once('../functions.php');
    if ($_SESSION['endgame'] == "lose") header("location:gameover.php") ?>
</head>

<body>
    <header>
        <a href="." accesskey="H">
            <h2><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./ranking.php" accesskey="T">
            <h2><i class="fas fa-medal"></i> RANKING</h2>
        </a>
        <h2 id="username"><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></h2>
    </header>
    <p id="title">Victory</p>
    <div class="box">
        <p id="text">You completed the <?= $_SESSION["actual_level"][0] ?> level.</p>
        <form action="../" method="post" id="form-home">
            <input type="submit" value="Home" accesskey="H" />
        </form>
        <form action="game.php?action=retry" method="post" id="form-try-again">
            <input type="submit" value="Try Again" accesskey="R" />
        </form>
        <form action="./game.php" method="post" id="form-next">
            <input type="submit" value="Next" name="next-level" accesskey="N" />
        </form>
    </div>
    <footer>
        <p class="level-code">Code: <strong><?= $_SESSION['actual_level'][4] ?></strong></p>
    </footer>
</body>

</html>