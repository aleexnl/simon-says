<?php
function get_level($level_number)
{
    $levels = file(__DIR__ . "/levels.cfg"); // __DIR__ is used to get the absolute path of the file.
    $level = explode(";", $levels[$level_number]);
    print_r($level);
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

function rankingResultOperation($level, $userTime){
    list ($x,$y)=explode("x", $level[1]);
    $squares = $x * $y;
    $goodSquares = $level[2];
    $showTime = $level[3];
    $try = $level[6];
    return((((($squares * $showTime)/$goodSquares)-$userTime)*100)/$try);

}
session_start();
if (isset($_POST["save"])){
    echo $_SESSION["actual_level"][6];
    $_SESSION["points"] += $_SESSION["lvlPoints"];
    file_put_contents(__DIR__ . '/ranking.cfg', getUserDetails() . PHP_EOL, FILE_APPEND | LOCK_EX);
    $_SESSION["actual_level"] = get_level(0);
    //header("location:./");  
}
if (isset($_POST["next-level"])){
    $_SESSION["points"] += $_SESSION["lvlPoints"];
    $_SESSION["actual_level"][6] = 1;
    $_SESSION["actual_level"] = get_level($_SESSION["actual_level"][5]++);
    print_r($_SESSION["actual_level"]);
    header("location:pages/game.php");
}
if (isset($_POST["try-again"])){
    $_SESSION["actual_level"][6] ++;
    header("location:pages/game.php");  
}