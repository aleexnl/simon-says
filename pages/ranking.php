<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/ranking.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <?php session_start();
    require_once("../functions.php");
    $usersCampaign = reedRankingFile("/ranking.cfg");
    usort($usersCampaign, function ($item1, $item2) {
        return $item2['points'] <=> $item1['points'];
    });
    $usersSurvival = reedRankingFile("/survival.cfg");
    usort($usersSurvival, function ($item1, $item2) {
        return $item2['points'] <=> $item1['points'];
    });
    ?>
</head>

<body>
    <header>
        <a href="../" accesskey="H">
            <h2 title="(Alt + H)"><i class="fas fa-home"></i> HOME</h2>
        </a>
        <a href="./ranking.php" accesskey="T">
            <h2 title="(Alt + T)"><i class="fas fa-medal"></i> RANKING</h2>
        </a>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
            <h2 id="username"><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></h2>
        <?php endif ?>
        <label class="switch" title="deuteranopia">
            <input id="chBox" type="checkbox" onclick='deuteranopia();'>
            <span class="slider round"></span>
        </label>
        <h2 title="deuteranopia">Colorblind Mode</h2>
    </header>
    <h1 class="title">Rankings</h1>
    <div class="ranking-box">
        <h2 class="subtitle">Campaign</h2>
        <?= createRankingTable($usersCampaign) ?>
    </div>
    <div class="ranking-box">
        <h2 class="subtitle survival">Survival</h2>
        <?= createRankingTable($usersSurvival) ?>
    </div>
    <script src="../js/blindness.js"></script>
</body>

</html>