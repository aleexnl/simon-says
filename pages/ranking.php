<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/ranking.css">
    <script src="https://kit.fontawesome.com/b17b075250.js" crossorigin="anonymous"></script>
    <?php session_start() ?>
    <?php require_once("../functions.php"); ?>
    <?php $users = reedRankingFile(); ?>
    <?php
    usort($users, function ($item1, $item2) {
        return $item2['punctuation'] <=> $item1['punctuation'];
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
    </header>
    <h1 class="title">Ranking</h1>
    <table cellspacing="0" cellpadding="0">
        <thead>
            <tr class="first-table-cell">
                <td>
                    <p class="width-username table-title">User</p>
                </td>
                <td>
                    <p class="width-points table-title">Points</p>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>";
                echo "<p class='username'>" . $user['user'] . "</p>";
                echo "</td>";
                echo "<td>";
                echo "<p class='points'>" . $user['punctuation'] . "</p>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>