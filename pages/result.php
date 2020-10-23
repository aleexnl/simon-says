<?php

session_start();

function getPositionBoxes($positionBoxes) {
    return true;
}

function getNumBoxes() {
    return 7;
}

//if (isset($_POST['var'])) {
    $numBoxes = 7;
    $positionBoxes = 0;

    if ($numBoxes == getNumBoxes() && getPositionBoxes($positionBoxes)) {
        $_SESSION['endgame'] = "win";
        header("location:victory.php");
    }else {
        $_SESSION['endgame'] = "lose";
        header("location:gameover.php");
    }
//}

?>