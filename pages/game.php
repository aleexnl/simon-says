<!DOCTYPE html>
<html lang="en">

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
        $randomNumber = mt_rand(0, 25);
        if (!in_array($randomNumber, $randomNumbers)) {
            array_push($randomNumbers, $randomNumber);
        }
    }
    ?>
</head>

<body>
    <header>
        <h2>Simon says</h2>
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
                    print_r($randomNumbers);
                    for ($rowCounter = 0; $rowCounter < 5; $rowCounter++) {
                        echo "<tr>";
                        for ($columnounter = 0; $columnounter < 5; $columnounter++) {
                            if (in_array($randomCounter++, $randomNumbers)) {
                                echo "<td><button type='submit' class='option selected'></button></td>";
                            } else {
                                echo "<td><button type='submit' class='option' name='btn-option'></button></td>";
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
                        <td class="box-btn"><button id="btn-resolv" type="submit" onclick="checkBtn('<?php echo implode(',', $randomNumbers) ?>' )">SOLVE</button></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="../js/game.js"></script>
</body>

</html>