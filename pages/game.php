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
    <?php
    session_start();
    require_once(__DIR__ . "/../functions.php");
    if (isset($_SESSION['user']) && isset($_GET["uname"])) {
        if ($_SESSION['user'] != $_GET["uname"]) {
            $_SESSION["actual_level"] = get_level(0);
        }
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
        <h3><a href="../index.php" id="webTitle">Simon says</a></h3>
        <div id="home"><a href="../">Home</a></div>
        <h3 id="uname">
            <?php
            $_SESSION["user"] = isset($_GET["uname"]) ? $_GET["uname"] : '';
            echo isset($_SESSION["user"]) ? $_SESSION['user'] : '';
            ?>
        </h3>
    </header>
    <div class="container">
        <div class="game">
            <table>
                <thead>
                    <tr>
                        <td colspan="5">
                            <h1><?= $_SESSION["actual_level"][0] ?> Level</h1>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($rowCounter = 0; $rowCounter < $grid[0]; $rowCounter++) {
                        echo "<tr>";
                        for ($columnounter = 0; $columnounter < $grid[1]; $columnounter++) {
                            if (in_array($randomCounter++, $randomNumbers)) {
                                echo "<td><button type='submit' class='square option solution'></button></td>";
                            } else {
                                echo "<td><button type='submit' class='square option'></button></td>";
                            }
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="box-btn"><button id="btn-start" type="submit">START GAME</button></td>
                        <td colspan="3"></td>
                        <td class="box-btn"><button id="btn-resolve" type="submit">SOLVE</button></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="../js/game.js"></script>
</body>

</html>