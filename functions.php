<?php
function get_level($level_number)
{
    $levels = file(__DIR__ . "/levels.cfg"); // __DIR__ is used to get the absolute path of the file.
    $level = explode(";", $levels[$level_number]);
    array_push($level, $level_number, 1);
    return $level;
}

function getUserDetails()
{
    return $_SESSION['user'] . ";" . $_SESSION['points'];
}

function writeInRankingFile($userStr)
{
    file_put_contents(__DIR__ . '/ranking.cfg', $userStr . PHP_EOL, FILE_APPEND | LOCK_EX);
}

function reedRankingFile()
{
    $users = [];
    $rankingFile = fopen(__DIR__ . "/ranking.cfg", "r") or die("Unable to open file!");
    while (!feof($rankingFile)) {
        $line = fgets($rankingFile);
        if ($line != "") {
            list($user, $punctuation) = explode(";", $line);
            array_push($users, array("user" => $user, "punctuation" => intval($punctuation)));
        }
    }
    return $users;
}

function rankingResultOperation($level, $userTime)
{
    list($x, $y) = explode("x", $level[1]);
    $squares = $x * $y;
    $goodSquares = $level[2];
    $showTime = $level[3];
    $try = $level[6];
    return ((((($squares * $showTime) / $goodSquares) - $userTime) * 100) / $try);
}

if (isset($_POST["save"])) {
    session_start();
    if ($_SESSION['endgame'] == "win")
        $_SESSION["points"] += $_SESSION["lvlPoints"];
    file_put_contents(__DIR__ . '/ranking.cfg', getUserDetails() . PHP_EOL, FILE_APPEND | LOCK_EX);
    $_SESSION["actual_level"] = get_level(0);
    header("location:pages/ranking.php");
}
if (isset($_POST["next-level"])) {
    session_start();
    $_SESSION["points"] += $_SESSION["lvlPoints"];
    $_SESSION["actual_level"][5]++;
    $_SESSION["actual_level"] = get_level($_SESSION["actual_level"][5]);
    header("location:pages/game.php");
}
if (isset($_POST["try-again"])) {
    session_start();
    $_SESSION["actual_level"][6]++;
    header("location:pages/game.php");
}
