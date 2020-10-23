<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You lose</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gameover.css">
</head>

<body id="victory">
    <header>
        <h2>Simon says</h2>
        <a href="../index.html">Home</a>
        <h3 id="uname">
            <?php
                session_start();
                echo isset($_SESSION["user"]) ? $_SESSION['user'] : '';

            ?>
        </h3>
    </header>
    <p id="title">Derrota</p>
    <div class="box">
        <p id="text">No has completado el nivel X</p>
        <form action="../" method="post" id="form-home">
            <input type="submit" value="Home" />
        </form>
        <form action="../" method="post" id="form-retry">
            <input type="submit" value="Reintentar" />
        </form>
    </div>
</body>

</html>