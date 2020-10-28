<html>
    <head>
        <title>Simon-says</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <header>
            <h3><a href="#" id="webTitle">Simon says</a></h3>
            <div id="home"><a href="#">Home</a></div>
            <h3><a href="./pages/ranking.php" id="ranking">Ranking</a></h3>
        </header>
        <div id="main-title">
            <img src="./img/Title.png" >
        </div>
        <h2 class="subtitle">Welcome to our site! Here you can enjoy the Simon says game online! Insert you user name and press the start game button to begin!</h2>
        <form id="form" action="pages/game.php" method="GET">
            <label for="uname"><b>USERNAME:</b></label>
            <input type="text" placeholder="Neo" name="uname" required><br>
            <input type="submit" value="Start game" href="index.html"></input>
        </form>
    </body>
</html>