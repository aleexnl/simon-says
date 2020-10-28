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
    <title>Juego</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/game.css">
    <?php
    $randomCounter = 1;
    $randomNumbers = [];
    while (count($randomNumbers) != 7) {
        $randomNumber = mt_rand(1, 25);
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
            session_start();
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
                            <h1>Level1</h1>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($rowCounter = 0; $rowCounter < 5; $rowCounter++) {
                        echo "<tr>";
                        for ($columnounter = 0; $columnounter < 5; $columnounter++) {
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