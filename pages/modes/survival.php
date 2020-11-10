<style>
    .wrong {
        background-color: <?= $impostorColor ?>;
    }

    .selected {
        background-color: <?= $correctColor ?>;
    }
</style>
<div class="container">
    <?php initializeSurvivalPoints();
    initializeSurvivalCountdown(); ?>
    <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
        <p id="countdownVelocity" style="display: none"><?= isset($_SESSION['survivalCountdownVelocity']) ? $_SESSION['survivalCountdownVelocity'] : 1000 ?></p>
        <p style="display: none"><?= $_SESSION['survivalPoints'] ?></p>
        <h1>Survival</h1>
        <?php if (!$isImposter) : ?>
            <h3>Select the <span id="correct-squares"><?= $normalSquares ?></span> <span style="<?= "color: $correctColor; text-shadow: 0 0 2px white;" ?>" id="correct-color"><?= $correctColor ?></span> correct squares.</h3>
        <?php else : ?>
            <h2>ATTENTION CREWMATE! There are <span id="impostor-squares"><?= $imposterSquares ?></span> <span style="<?= "color: $impostorColor; text-shadow: 0 0 2px white;" ?>" id="impostor-color"><?= $impostorColor ?></span> impostor squares among us!</h2>
            <h3>Select the <span id="correct-squares"><?= $normalSquares ?></span> correct squares with the color <span style="<?= "color: $correctColor; text-shadow: 0 0 2px white;" ?>" id="correct-color"><?= $correctColor ?></span>.</h3>
        <?php endif ?>
        <h3>You have <span id="show-time"><?= $secondsToShow ?></span> seconds to memorize the squares and <span id="countdown"><?= $_SESSION['survivalCountdown'] ?></span> to resolv.</h3>
        <div id="BarContent">
            <div id="Bar">
                <div id="Progress">
                    <div id="timer"></div>
                </div>
            </div>
        </div>
        <button title="(Alt + P)" id="btn-start" type="submit" accesskey="P">START GAME</button>
        <button title="(Alt + S)" id="btn-resolve" type="submit" accesskey="S" disabled>SOLVE</button>
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
    <?php else :
        header("location:../");
    endif ?>
</div>