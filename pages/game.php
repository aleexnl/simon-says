<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION["actual_level"][0] ?> Level</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/game.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <audio id="hoverAudio" preload="auto" src="../sounds/hover.wav"></audio>
    <audio id="selectAudio" preload="auto" src="../sounds/select.wav"></audio>
    <style>
        .wrong {
            background-color: red;
        }
    </style>
    <?php
    require_once(__DIR__ . "/../functions.php"); // Import function files
    $isSurvival = false;
    $isImposter = false;
    function normalBoard($grid, $numbers)
    {
        $randomCounter = 1;
        for ($rowCounter = 0; $rowCounter < $grid[0]; $rowCounter++) {
            echo "<tr>";
            for ($columnCounter = 0; $columnCounter < $grid[1]; $columnCounter++) {
                if (in_array($randomCounter++, $numbers)) {
                    echo "<td><button type='submit' class='square option solution' disabled></button></td>";
                } else {
                    echo "<td><button type='submit' class='square option' disabled></button></td>";
                }
            }
            echo "</tr>";
        }
    }
    function imposterBoard($grid, $numbers, $imposterNumbers)
    {
        $randomCounter = 1;
        for ($rowCounter = 0; $rowCounter < $grid[0]; $rowCounter++) {
            echo "<tr>";
            for ($columnCounter = 0; $columnCounter < $grid[1]; $columnCounter++) {
                if (in_array($randomCounter, $numbers)) {
                    $randomCounter++;
                    echo "<td><button type='submit' class='square option solution' disabled></button></td>";
                } elseif (in_array($randomCounter, $imposterNumbers)) {
                    $randomCounter++;
                    echo "<td><button type='submit' class='square option impostor' disabled></button></td>";
                } else {
                    $randomCounter++;
                    echo "<td><button type='submit' class='square option' disabled></button></td>";
                }
            }
            echo "</tr>";
        }
    }
    function generateRandomNumbers($limit, $gridTotal, $compareArray = [])
    {
        $numbers = [];
        while (count($numbers) != $limit) {
            $randomNumber = mt_rand(1, $gridTotal);
            if (!in_array($randomNumber, $numbers) && !in_array($randomNumber, $compareArray)) {
                array_push($numbers, $randomNumber);
            }
        }
        return $numbers;
    }
    function getLevelFromCode()
    {
        /* QUITAR LOS ESPACIOS DEL INPUT DEL CODE */
        for ($index = 0; $index < 10; $index++) {
            $lvl = get_level($index);
            $lvlCode = str_replace("\n", "", get_level($index)[4]);
            if ($lvlCode == $_POST['code']) {
                $_SESSION['actual_level'] = $lvl;
                break;
            }
        }
    }
    if (isset($_POST['imposterMode']) or $_SESSION["imposterMode"]) {
        $isImposter = true;
        $_SESSION["imposterMode"] =  true;
    }

    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = $_POST["uname"];
    }

    if (isset($_POST['code'])) {
        getLevelFromCode();
    }

    if (isset($_SESSION['user'], $_POST["uname"])) {
        if ($_SESSION['user'] != $_POST["uname"]) {
            $_SESSION['user'] = $_POST["uname"];
            $_SESSION["actual_level"] = get_level(0);
        }
    }
    $grid = explode('x', $_SESSION['actual_level'][1]);
    $gridTotal = $grid[0] * $grid[1];
    $randomNumbers = [];

    if ($isImposter) {
        $imposterSquares = floor($_SESSION['actual_level'][2] / 2);
        // echo "Impostor Squares: " .  $imposterSquares;
        $normalSquares = $_SESSION['actual_level'][2] - $imposterSquares;
        // echo "Normal Squares: " .  $normalSquares;
        array_push($randomNumbers, [], []);
        $randomNumbers[0] = generateRandomNumbers($normalSquares, $gridTotal);
        //print_r($randomNumbers[0]);
        $randomNumbers[1] = generateRandomNumbers($imposterSquares, $gridTotal, $randomNumbers[0]);
        //print_r($randomNumbers[1]);
    } else {
        $randomNumbers = generateRandomNumbers($_SESSION['actual_level'][2], $gridTotal);
    }

    ?>

</head>

<body>
    <noscript>You need to enable JavaScript in your browser in order to play this game</noscript>
    <header>
        <a href="../index.php" accesskey="h">
            <h2 title="(Alt + H)"><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./ranking.php" accesskey="T">
            <h2 title="(Alt + T)"><i class="fas fa-medal"></i> RANKING</h2>
        </a>
        <h2 id="username"><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></h2>
    </header>

    <div class="container">
        <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
            <h1><?= $_SESSION["actual_level"][0] ?> Level</h1>
            <?php if (!$isImposter) : ?>
                <h3>Select the <span id="correct-squares"><?= $_SESSION['actual_level'][2] ?></span> correct squares</h3>
            <?php else : ?>
                <h2>ATTENTION CREWMATE! There are <span id="impostor-squares"><?= $imposterSquares ?></span> impostor squares among us!</h2>
                <h3>Select the <span id="correct-squares"><?= $normalSquares ?></span> correct squares</h3>
            <?php endif ?>
            <h3>You have <span id="show-time"><?= $_SESSION["actual_level"][3] ?></span> seconds to memorize the squares.</h3>
            <div id="BarContent">
                <div id="Bar">
                    <div id="Progress">
                        <div id="timer"></div>
                    </div>
                </div>
            </div>
            <button title="(Alt + P)" id="btn-start" type="submit" accesskey="P">START GAME</button>
            <button title="(Alt + S)" id="btn-resolve" type="submit" accesskey="S">SOLVE</button>
            <div class="game">
                <table>
                    <tbody>
                        <?php
                        if (!$isImposter) {
                            normalBoard($grid, $randomNumbers);
                        } else {
                            imposterBoard($grid, $randomNumbers[0], $randomNumbers[1]);
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <h1>ERROR</h1>
            <p>Please, enter a valid username before accessing to the game!</p>
        <?php endif ?>
    </div>
    <script src="../js/game.js"></script>
</body>

</html>