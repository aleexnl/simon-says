<?php
function get_level($level_number)
{
    $levels = file("levels.cfg");
    $level = explode(";", $levels[$level_number]);
    array_push($level, $level_number);
    return $level;
}
