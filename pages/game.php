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
    <?php
    require_once(__DIR__ . "/../functions.php"); // Import function files

    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = $_GET["uname"];
    }

    if (isset($_SESSION['user'], $_GET["uname"])) {
        if ($_SESSION['user'] != $_GET["uname"]) {
            $_SESSION['user'] = $_GET["uname"];
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
        <a href="../" accesskey="h">
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
            <h2>Select the <span id="correct-squares"><?= $_SESSION['actual_level'][2] ?></span> correct squares</h2>
            <h3>You have <span id="show-time"><?= $_SESSION["actual_level"][3] ?></span> seconds to memorize the squares.</h3>
            <button title="(Alt + P)" id="btn-start" type="submit" accesskey="P">START GAME</button>
            <button title="(Alt + S)" id="btn-resolve" type="submit" accesskey="S">SOLVE</button>
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
