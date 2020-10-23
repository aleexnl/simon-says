<?php

session_start();

if (isset($_GET['result'])) {
    if ($_GET['result'] == "win") {
        $_SESSION['endgame'] = "win";
        header("location:victory.php");
    }else if ($_GET['result'] == "lose") {
        $_SESSION['endgame'] = "lose";
        header("location:gameover.php");
    }
} else header("location:../");
