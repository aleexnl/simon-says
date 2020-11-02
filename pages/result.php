<?php

session_start();
require_once('../functions.php');

if (isset($_GET['result'])) {

    $_SESSION['lvlPoints'] = ceil(rankingResultOperation($_SESSION['actual_level'], $_GET['userTime']));

    if ($_SESSION["actual_level"][5] == 0)
        $_SESSION['points'] = 0;

    if ($_GET['result'] == "win") {
        $_SESSION['endgame'] = "win";
        header("location:victory.php");
    } else if ($_GET['result'] == "lose") {
        $_SESSION['endgame'] = "lose";
        header("location:gameover.php");
    }
} else header("location:../");
