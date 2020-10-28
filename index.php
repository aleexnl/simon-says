<html>

<head>
    <title>Simon-says</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<?php
session_start();
require_once('functions.php');
if (!isset($_SESSION["actual_level"])) {
    $_SESSION["actual_level"] = get_level(0);
}
?>

<body>
    <header>
        <a href="#">
            <h2>Simon says</h2>
        </a>
        <div id="home"><a href="#">Home</a></div>
        <h3 id="uname"></h3>
    </header>
    <div id="main-title">
        <img src="./img/Title.png">
    </div>
    <h2 class="subtitle">Welcome to our site! Here you can enjoy the Simon says game online! Insert you user name and press the start game button to begin!</h2>
    <form id="form" action="pages/game.php" method="GET">
        <label for="uname"><b>USERNAME:</b></label>
        <input type="text" placeholder="Neo" name="uname" required><br>
        <input type="submit" value="Start game" href="index.html"></input>
    </form>
</body>

</html>