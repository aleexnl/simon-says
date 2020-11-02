<?php
function get_level($level_number)
{
    $levels = file(__DIR__ . "/levels.cfg"); // __DIR__ is used to get the absolute path of the file.
    $level = explode(";", $levels[$level_number]);
    array_push($level, $level_number);
    return $level;
}

function levelUp()
{
    header("location:./");
}

function writeInRankingFile($userStr)
{
    file_put_contents('../ranking.cfg', $userStr . PHP_EOL, FILE_APPEND | LOCK_EX);
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
