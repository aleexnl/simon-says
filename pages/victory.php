<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Win</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/victory.css">
    <?php session_start();
    if ($_SESSION['endgame'] == "lose") header("location:gameover.php") ?>
</head>

<body id="victory">
    <header>
        <h2>Simon says</h2>
        <div id="home"><a href="../">Home</a></div>
        <h3 id="uname">
            <?php echo isset($_SESSION["user"]) ? $_SESSION['user'] : ''; ?>
        </h3>
    </header>
    <p id="title">Victory</p>
    <div class="box">
        <p id="text">You completed the level X</p>
        <form action="../" method="post" id="form-home">
            <input type="submit" value="Home" />
        </form>
        <form action="../" method="post" id="form-next">
            <input type="submit" value="Next" />
        </form>
    </div>
</body>

</html>