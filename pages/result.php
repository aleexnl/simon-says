<?php

session_start();

if (isset($_GET['result'])) {
    $_SESSION['punctuation'] = 200;

    if ($_GET['result'] == "win") {
        if($_SESSION['actual_level'][5] == 9) writeInRankingFile(getUserDetails());
        $_SESSION['endgame'] = "win";
        header("location:victory.php");
    } else if ($_GET['result'] == "lose") {
        writeInRankingFile(getUserDetails());
        $_SESSION['endgame'] = "lose";
        header("location:gameover.php");
    }
} else header("location:../");