<?php
function get_level($level_number)
{
    $levels = file(__DIR__ . "/levels.cfg"); // __DIR__ is used to get the absolute path of the file.
    $level = explode(";", $levels[$level_number]);
    array_push($level, $level_number);
    return $level;
}
