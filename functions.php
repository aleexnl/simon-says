<?php
// GET LEVEL PARAMETERS
function get_level($level_number)
{
    $levels = file(__DIR__ . "/levels.cfg"); // __DIR__ is used to get the absolute path of the file.
    $level = explode(";", $levels[$level_number]);
    array_push($level, $level_number, 1);
    return $level;
}

// GET USER AND USER POINTS OF SESSION
function getUserDetails()
{
    if ($_SESSION['survivalMode'])
        return $_SESSION['user'] . ";" . $_SESSION['survivalPoints'];
    else
        return $_SESSION['user'] . ";" . $_SESSION['points'];
}

// WRITE NEW USER IN RANKING FILE
function writeInRankingFile($userStr)
{
    file_put_contents(__DIR__ . '/ranking.cfg', $userStr . PHP_EOL, FILE_APPEND | LOCK_EX);
}

// READ ALL LINES OF RANKING FILE 
function reedRankingFile($file)
{
    $users = [];
    $rankingFile = fopen(__DIR__ . $file, "r") or die("Unable to open file!");
    while (!feof($rankingFile)) {
        $line = fgets($rankingFile);
        if ($line != "") {
            list($user, $punctuation) = explode(";", $line);
            array_push($users, array("user" => $user, "punctuation" => intval($punctuation)));
        }
    }
    return $users;
}

// CALCULATE USER POINTS WITH THE FORMULA
function rankingResultOperation($level, $userTime)
{
    list($x, $y) = explode("x", $level[1]);
    $squares = $x * $y;
    $goodSquares = $level[2];
    $showTime = $level[3];
    $try = $level[6];
    return ((((($squares * $showTime) / $goodSquares) - $userTime) * 100) / $try);
}

// GET NUM OF IMPOSTOR SQUARES AND NORMAL SQUARES
function impostorAndNormalSquares($squares)
{
    $imposterSquares = floor($squares / 2);
    $normalSquares = $squares - $imposterSquares;
    return [$imposterSquares, $normalSquares];
}

// CREATE NORMAL TABLE WITHOUT IMPOSTOR MODE
function createNormalBoard($grid, $numbers)
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

// CREATE NORMAL TABLE WITH IMPOSTOR MODE
function createImposterBoard($grid, $numbers, $imposterNumbers)
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

// GENERATE RANDOM NUMBER FOR THE TABLE
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

// RESET POINTS OF CAMPAIGN OR SURVIVAL MODE
function resetPoints()
{
    if (isset($_POST['survivalMode'])) {
        $_SESSION['survivalPoints'] = 0;
        $_SESSION['survivalCountdown'] = 15;
    } else {
        $_SESSION['points'] = 0;
        $_SESSION['lvlPoints'] = 0;
        $_SESSION["actual_level"] = get_level(0);
    }
}

// SET IMPOSTER MODE ON SESSION AND VARIABLE IN TRUE OR FALSE
function setImposterModeTrue()
{
    if (isset($_POST['page']) && !isset($_POST['imposterMode']) && $_SESSION['imposterMode']) {
        // NEW GAME WITHOUT IMPOSTOR
        $_SESSION["imposterMode"] =  false;
        resetPoints();
    }
    if (isset($_POST['page']) && isset($_POST['imposterMode']) && !$_SESSION['imposterMode']) {
        // NEW GAME WITH IMPOSTOR
        global $isImposter;
        $isImposter = true;
        $_SESSION["imposterMode"] =  true;
        resetPoints();
    }
}

// SET SURVIVAL MODE ON SESSION AND VARIABLE IN TRUE
function setSurvivalModeTrue()
{
    global $isSurvival;
    if (isset($_POST['page']) && !isset($_POST['survivalMode']) && $_SESSION['survivalMode']) {
        // NEW GAME WITH CAMPAIGN MODE
        $_SESSION["survivalMode"] =  false;
        resetPoints();
    }
    if (isset($_POST['page']) && isset($_POST['survivalMode']) && !$_SESSION['survivalMode']) {
        // NEW GAME WITH SURVIVE MODE
        $isSurvival = true;
        $_SESSION["survivalMode"] =  true;
        resetPoints();
    }
    if (isset($_POST['survivalMode']) or $_SESSION["survivalMode"]) {
        // FOLLOW WITH THE SAME SURVIVAL MODE
        $isSurvival = true;
        $_SESSION["survivalMode"] =  true;
    }
}

// SET USERNAME IN THE SESSION
function setUsername()
{
    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = $_POST["uname"];
        if ($_SESSION['survivalMode']) {
            initializeSurvivalPoints();
            initializeSurvivalCountdown();
        }
    }
}

// GET SPECIFIED LEVEL WITH THE CODE LEVEL
function getLevelFromCode()
{
    if (isset($_POST['code'])) {
        $code = str_replace(" ", "", $_POST['code']);
        for ($index = 0; $index < 10; $index++) {
            $lvl = get_level($index);
            $lvlCode = str_replace("\n", "", get_level($index)[4]);
            if ($lvlCode == $code) {
                // RESETEAR LA PUNTUACION
                $_SESSION['actual_level'] = $lvl;
                $_SESSION["points"] = 0;
                $_SESSION["lvlPoints"] = 0;
                break;
            }
        }
    }
}

// CHANGE USERNAME AND PUT LEVEL TO 0
function resetDetails()
{
    if (isset($_SESSION['user'], $_POST["uname"])) {
        if ($_SESSION['user'] != $_POST["uname"]) {
            $_SESSION['user'] = $_POST["uname"];
            resetPoints();
        }
    }
}

// GET RANDOM NUMBER WITH MIN AN MAX NUMBER
function getRandomNumber($min, $max)
{
    return random_int($min, $max);
}

// GENERATE PARAMETERS TABLE FOR THE SURVIVAL MODE
function generateParametersTable()
{
    $maxDimension = $maxSquares = $maxSeconds = 0;
    $minDimension = $minSquares = $minSeconds = 99;
    $colors = [];

    $levels = file(__DIR__ . "/levels.cfg"); // __DIR__ is used to get the absolute path of the file.
    foreach ($levels as $level) {
        list($color, $dimension, $squares, $seconds) = explode(";", $level);
        $dimensionX = explode("x", $dimension)[0]; // GET DIMENSION X 

        array_push($colors, $color);

        // DIMENSION TABLE
        if ($maxDimension < $dimensionX) $maxDimension = $dimensionX;
        if ($minDimension > $dimensionX) $minDimension = $dimensionX;

        // NUM OF SQUARES
        if ($maxSquares < $squares) $maxSquares = $squares;
        if ($minSquares > $squares) $minSquares = $squares;

        // NUM OF SECONDS TO SHOW
        if ($maxSeconds < $seconds) $maxSeconds = $seconds;
        if ($minSeconds > $seconds) $minSeconds = $seconds;
    }
    return [$minDimension, $maxDimension, $minSquares, $maxSquares, $minSeconds, $maxSeconds, $colors];
}

// IF IS CAMPAIGN MODE GENERATE THIS PARAMETERS
function startCampaignMode($isImposter)
{
    global $grid, $randomNumbers, $imposterSquares, $normalSquares;
    global $secondsToShow, $correctColor, $impostorColor;

    getLevelFromCode();

    $correctColor = ctype_lower($_SESSION['actual_level'][0]);
    $impostorColor = "red";

    $grid = explode('x', $_SESSION['actual_level'][1]);
    $gridTotal = $grid[0] * $grid[1];
    $secondsToShow = $_SESSION["actual_level"][3];

    if ($isImposter) {
        list($imposterSquares, $normalSquares) = impostorAndNormalSquares($_SESSION['actual_level'][2]);
        array_push($randomNumbers, [], []);
        $randomNumbers[0] = generateRandomNumbers($normalSquares, $gridTotal);
        $randomNumbers[1] = generateRandomNumbers($imposterSquares, $gridTotal, $randomNumbers[0]);
    } else {
        $randomNumbers = generateRandomNumbers($_SESSION['actual_level'][2], $gridTotal);
    }
}

// IF IS SURVIVAL MODE GENERATE THIS PARAMETERS
function startSurvivalMode($isImposter)
{
    global $grid, $randomNumbers, $imposterSquares, $normalSquares;
    global $secondsToShow, $correctColor, $impostorColor;

    list(
        $minDimension,
        $maxDimension,
        $minSquares,
        $maxSquares,
        $minSeconds,
        $maxSeconds,
        $colors,
    ) = generateParametersTable(); // GENERATE TABLE DIMENSION, NUM OF squares AND SECONDS 

    $tableNumber = getRandomNumber($minDimension, $maxDimension);
    $grid = [$tableNumber, $tableNumber];

    $numberOfSquares = getRandomNumber($minSquares, $maxSquares);
    $secondsToShow = getRandomNumber($minSeconds, $maxSeconds);

    // GET RANDOM COLORS
    $correctColor = $impostorColor = $colors[getRandomNumber(0, sizeof($colors) - 1)];
    while ($correctColor == $impostorColor)
        $impostorColor = $colors[getRandomNumber(0, sizeof($colors) - 1)];

    $gridTotal = $tableNumber * $tableNumber;

    if ($isImposter) {
        list($imposterSquares, $normalSquares) = impostorAndNormalSquares($numberOfSquares);
        array_push($randomNumbers, [], []);
        $randomNumbers[0] = generateRandomNumbers($normalSquares, $gridTotal);
        $randomNumbers[1] = generateRandomNumbers($imposterSquares, $gridTotal, $randomNumbers[0]);
    } else {
        $normalSquares = $numberOfSquares;
        $randomNumbers = generateRandomNumbers($numberOfSquares, $gridTotal);
    }
}

// VELOCITY OF COUNTDOWN IN SURVIVAL MODE
function setSurvivalCountdownVelocity()
{
    if ($_SESSION['survivalPoints'] >= 2000)
        $_SESSION['survivalCountdownVelocity'] = 600;
    else if ($_SESSION['survivalPoints'] >= 1000)
        $_SESSION['survivalCountdownVelocity'] = 800;
    else
        $_SESSION['survivalCountdownVelocity'] = 1000;
}

// ADD 200 POINTS FOR PASS THE LEVEL IN SURVIVAL MODE
function addMoreSurvivalPoints()
{
    initializeSurvivalPoints();
    $_SESSION['survivalPoints'] += 200;
}

// INITIALIZE SURVIVAL POINTS TO 0
function initializeSurvivalPoints()
{
    isset($_SESSION['survivalPoints']) ? '' : $_SESSION['survivalPoints'] = 0;
}

// INITIALIZE SURVIVAL COUNTDOWN TO 15
function initializeSurvivalCountdown()
{
    isset($_SESSION['survivalCountdown']) ? '' : $_SESSION['survivalCountdown'] = 15;
}

// SAVE USER POINTS IN THE RANKING FILE
if (isset($_POST["save"])) {
    session_start();
    if ($_SESSION['survivalMode']) {
        if ($_SESSION['endgame'] == "win")
            addMoreSurvivalPoints();
        file_put_contents(__DIR__ . '/survival.cfg', getUserDetails() . PHP_EOL, FILE_APPEND | LOCK_EX);
        $_SESSION['survivalPoints'] = 0;
        $_SESSION['survivalCountdown'] = 15;
        setSurvivalCountdownVelocity();
    } else {
        if ($_SESSION['endgame'] == "win")
            $_SESSION["points"] += $_SESSION["lvlPoints"];
        file_put_contents(__DIR__ . '/ranking.cfg', getUserDetails() . PHP_EOL, FILE_APPEND | LOCK_EX);
        $_SESSION["actual_level"] = get_level(0);
        $_SESSION["points"] = 0;
        $_SESSION["lvlPoints"] = 0;
    }
    header("location:pages/ranking.php");
}
// PASS TO THE NEXT LEVEL
if (isset($_POST["next-level"]) || isset($_POST["home"]) || isset($_GET['goHome'])) {
    session_start();
    if ($_SESSION['survivalMode']) {
        $_SESSION['survivalCountdown'] = $_SESSION['nextSurvivalCountdown'] + 5;
        addMoreSurvivalPoints();
        setSurvivalCountdownVelocity();
    } else {
        $_SESSION["points"] += $_SESSION["lvlPoints"];
        $_SESSION["actual_level"][5]++;
        $_SESSION["actual_level"] = get_level($_SESSION["actual_level"][5]);
    }
    if (isset($_POST["next-level"]))
        header("location:pages/game.php");
    else
        header("location:./");
}
// TRY AGAIN THE SAME LEVEL
if (isset($_POST["try-again"])) {
    session_start();
    if (!$_SESSION['survivalMode'])
        $_SESSION["actual_level"][6]++;
    header("location:pages/game.php");
}
