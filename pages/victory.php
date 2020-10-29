<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Win</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/victory.css">
    <?php session_start();
    require_once('../functions.php');
    if ($_SESSION['endgame'] == "lose") header("location:gameover.php") ?>
</head>

<body>
    <header>
        <h3><a href="../index.php" id="webTitle">Simon says</a></h3>
        <div id="home"><a href="../">Home</a></div>
        <h3 id="uname">
            <?php echo isset($_SESSION["user"]) ? $_SESSION['user'] : ''; ?>
        </h3>
    </header>
    <p id="title">Victory</p>
    <div class="box">
        <p id="text">You completed the <?= $_SESSION["actual_level"][0] ?> level.</p>
        <form action="../" method="post" id="form-home">
            <input type="submit" value="Home" />
        </form>
        <form action="game.php" method="post" id="form-try-again">
            <input type="submit" value="Try Again" />
        </form>
        <form action="#level-up" method="post" id="form-next">
            <input type="submit" value="Next" onclick="<?php levelUp() ?>" />
        </form>
    </div>
    <footer>
        <p class="level-code">Code: <strong><?= $_SESSION['actual_level'][4] ?></strong></p>
    </footer>
</body>

</html>