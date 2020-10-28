<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/ranking.css">
    <?php /*** AQUÍ QUE LEER EL ARCHIVO DEL RANKING ***/ ?>
    <?php /*** AQUÍ ORDENAR EL ARRAY DEL RANKING ***/ ?>
</head>

<body>
    <header>
        <h2>Simon says</h2>
        <div id="home"><a href="../">Home</a></div>
        <h3 id="uname">
            <?php echo isset($_SESSION["user"]) ? $_SESSION['user'] : ''; ?>
        </h3>
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
            <tr>
                <td>
                    <p class="username">Alex</p>
                </td>
                <td>
                    <p class="points">1700</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="username">Jesus</p>
                </td>
                <td>
                    <p class="points">1500</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="username">Carlos</p>
                </td>
                <td>
                    <p class="points">1200</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="username">David</p>
                </td>
                <td>
                    <p class="points">1000</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>