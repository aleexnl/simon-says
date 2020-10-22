<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/game.css">
</head>
<body>
    <header>
        <h2>Simon says</h2>
        <a href="../index.html">Home</a>
        <h3 id="uname">
            <?php
                session_start();
                $_SESSION["user"] = $_GET["uname"];
                print_r($_SESSION["user"]);
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
                    <tr>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                        <td><button type="submit" class="option"></button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="box-btn"><button id="btn-start" type="submit">INICIA PARTIDA</button></td>
                        <td colspan="3"></td>
                        <td class="box-btn"><button id="btn-resolv" type="submit">RESOLDRE</button></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="../js/game.js"></script>
</body>

</html>