<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'index.php';
require 'blackjack.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Blackjack</title>
</head>
<body>
<div class="container">
    <h1>Blackjack Game</h1>
    <nav>
    </nav>
    <form method="post">


        <fieldset>
            <legend>Player</legend>

          <div><?php
/*              echo $person . "'s fist two cards are: " . $this->firstcard . " and " . $this->secondcard . "<br>";
              echo $person . "'s total is " . $this->score . "<br>";*/

/*              $hitOutput = $player->set_hit($player_name);
              echo  $hitOutput[0];
              echo  $hitOutput[1];*/
            echo $player->keepscore($player_name)
                ?></div>

        </fieldset>

        <fieldset>
            <legend>Dealer</legend>
            <?php

            echo $dealer->keepscore($dealer_name)

            ?>
        </fieldset>

        <h4>Game</h4>
        <div>
            <?php
            //$dealer->set_firstDeal($dealer_name);
            //endgame();
            ?>

        </div>
        <button name = "deal" type="submit" value="0" <?php /*echo $dealOutput[2] */?> class="btn btn-info">Deal!</button>
        <button name = "hit" type="submit" value="1" <?php /*echo $hitOutput[2]*/?>  class="btn btn-info">Hit Me!</button>
        <button name = "stand" type="submit" value="2" class="btn btn-info">Stand</button>
        <button name = "surrender" type="submit" value="3" class="btn btn-info">Surrender</button>
        <br>
        <button name = "newGame" type="submit" value="4" class="btn my-1 px-3 btn-dark">New Game</button>
    </form>

    <footer>
        <br>
        <br>
        Thank you for playing.</footer>
    <div><?php
        whatIsHappening();
        ?></div>
    <br>
    <br>
</div>

</body>
</html>
