<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You lose</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gameover.css">
    <?php session_start();
    if ($_SESSION['endgame'] == "win") header("location:victory.php") ?>
</head>

<body>
    <header>
        <h2>Simon says</h2>
        <div id="home"><a href="../">Home</a></div>
        <h3 id="uname">
            <?php echo isset($_SESSION["user"]) ? $_SESSION['user'] : ''; ?>
        </h3>
    </header>
    <p id="title">Game Over</p>
    <div class="box">
        <p id="text">You didn't pass the level X</p>
        <form action="../" method="post" id="form-home">
            <input type="submit" value="Home" />
        </form>
        <form action="game.php?uname=<?php echo isset($_SESSION["user"]) ? $_SESSION['user'] : ''; ?>" method="post" id="form-retry">
            <input type="submit" value="Try again" />
        </form>
    </div>
</body>

</html>