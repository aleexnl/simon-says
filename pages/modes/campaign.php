<style>
    .wrong {
        background-color: red;
    }
</style>
<div class="container">
    <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
        <h1><?= $_SESSION["actual_level"][0] ?> Level</h1>
        <?php if (!$isImposter) : ?>
            <h3>Select the <span id="correct-squares"><?= $_SESSION['actual_level'][2] ?></span> correct squares</h3>
        <?php else : ?>
            <h2>ATTENTION CREWMATE! There are <span id="impostor-squares"><?= $imposterSquares ?></span> impostor squares among us!</h2>
            <h3>Select the <span id="correct-squares"><?= $normalSquares ?></span> correct squares</h3>
        <?php endif ?>
        <h3>You have <span id="show-time"><?= $secondsToShow ?></span> seconds to memorize the squares.</h3>
        <div id="BarContent">
            <div id="Bar">
                <div id="Progress">
                    <div id="timer"></div>
                </div>
            </div>
        </div>
        <button title="(Alt + P)" id="btn-start" type="submit" accesskey="P">START GAME</button>
        <button title="(Alt + S)" id="btn-resolve" type="submit" accesskey="S">SOLVE</button>
        <div class="game">
            <table>
                <tbody>
                    <?php
                    print_r($grid);
                    if (!$isImposter) {
                        createNormalBoard($grid, $randomNumbers);
                    } else {
                        createImposterBoard($grid, $randomNumbers[0], $randomNumbers[1]);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <h1>ERROR</h1>
        <p>Please, enter a valid username before accessing to the game!</p>
    <?php endif ?>
</div>