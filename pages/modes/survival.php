<style>
    .wrong {
        background-color: <?= $impostorColor ?>;
    }
    .selected {
        background-color: <?= $correctColor ?>;
    }
</style>
<div class="container">
    <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
        <h1>Survival</h1>
        <?php if (!$isImposter) : ?>
            <h3>Select the <span id="correct-squares"><?= $_SESSION['actual_level'][2] ?></span> correct squares</h3>
        <?php else : ?>
            <h2>ATTENTION CREWMATE! There are <span id="impostor-squares"><?= $imposterSquares ?></span> <span style="<?= "color: $impostorColor" ?>" id="impostor-color"><?= $impostorColor ?></span> impostor squares among us!</h2>
            <h3>Select the <span id="correct-squares"><?= $normalSquares ?></span> correct squares with the color <span style="<?= "color: $correctColor" ?>" id="correct-color"><?= $correctColor ?></span>.</h3>
        <?php endif ?>
        <h3>You have <span id="show-time"><?= $secondsToShow ?></span> seconds to memorize the squares and <span id="countdown">17</span> to resolv.</h3>
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
                    if (!$isImposter)
                        createNormalBoard($grid, $randomNumbers);
                    else
                        createImposterBoard($grid, $randomNumbers[0], $randomNumbers[1]);
                    ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <h1>ERROR</h1>
        <p>Please, enter a valid username before accessing to the game!</p>
    <?php endif ?>
</div>