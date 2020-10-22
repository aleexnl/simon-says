<?php

function getPositionBoxes($positionBoxes) {
    return true;
}

function getNumBoxes() {
    return 7;
}

//if (isset($_POST['var'])) {
    $numBoxes = 6;

    if ($numBoxes == getNumBoxes() && getPositionBoxes($positionBoxes)) {
        header("location:victory.php");
    }else {
        header("location:gameover.php");
    }
//}

?>