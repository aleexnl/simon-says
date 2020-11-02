<!DOCTYPE html>
<html lang="en">
<!--TODO:
- Deshabilitar boton iniciar partida una vez presionado.
- Deshabilitar botones hasta que se inicia el juego.
- Pasar estilos header index.
- Estilo de botones
 -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION["actual_level"][0] ?> Level</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/game.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    require_once(__DIR__ . "/../functions.php");
    if (!isset($_SESSION['user'], $_GET["uname"]) && $_GET["action"] != "retry") {
        $_SESSION['user'] = $_GET["uname"];
    }
    if (isset($_SESSION['user'], $_GET["uname"])) {
        if ($_SESSION['user'] != $_GET["uname"]) {
            $_SESSION['user'] = $_GET["uname"];
            $_SESSION["actual_level"] = get_level(0);
        }
    }
    if (isset($_SESSION, $_POST['next-level'])) {
        $_SESSION["actual_level"] = get_level($_SESSION["actual_level"][5] + 1);
    }
    $grid = explode('x', $_SESSION['actual_level'][1]);
    $grid_total = $grid[0] * $grid[1];
    $randomCounter = 1;
    $randomNumbers = [];
    while (count($randomNumbers) != $_SESSION['actual_level'][2]) {
        $randomNumber = mt_rand(1, $grid_total);
        if (!in_array($randomNumber, $randomNumbers)) {
            array_push($randomNumbers, $randomNumber);
        }
    }
    ?>
</head>

<body>
    <header>
        <a href="../" accesskey="h">
            <h2><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./ranking.php" accesskey="T">
            <h2><i class="fas fa-medal"></i> RANKING</h2>
        </a>
        <h2 id="username"><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></h2>
    </header>

    <div class="container">
        <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
            <h1><?= $_SESSION["actual_level"][0] ?> Level</h1>
            <button id="btn-start" type="submit" accesskey="P">START GAME</button>
            <button id="btn-resolve" type="submit" accesskey="S">SOLVE</button>
            <div class="game">
                <table>
                    <tbody>
                        <?php
                        for ($rowCounter = 0; $rowCounter < $grid[0]; $rowCounter++) {
                            echo "<tr>";
                            for ($columnounter = 0; $columnounter < $grid[1]; $columnounter++) {
                                if (in_array($randomCounter++, $randomNumbers)) {
                                    echo "<td><button type='submit' class='square option solution' disabled></button></td>";
                                } else {
                                    echo "<td><button type='submit' class='square option' disabled></button></td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <h1>ERROR</h1>
            <p>Please, enter a valid username before accesing to the game!</p>
        <?php endif ?>
    </div>
    <script src="../js/game.js"></script>
</body>

</html>