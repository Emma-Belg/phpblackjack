<?php
//initiating players/dealer
$player_name = 'Player';
$dealer_name = 'Dealer';
$player = new Blackjack($player_name);
$dealer = new Blackjack($dealer_name);

if (isset($_POST["newGame"])) {
    $player->newGame($player_name);
    $dealer->newGame($dealer_name);
}

//Deal button
if (isset($_POST["deal"])) {
    $player->set_firstDeal($player_name);
}

//Hit button for players
if (isset($_POST["hit"])) {
    $hitOutput = $player->set_hit($player_name);
}


if (isset($_POST["stand"])) {

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $endgame = array();
    if (isset($_POST["stand"])) {
        $dealer->set_firstDeal($dealer_name);
        if ($_SESSION[$dealer_name] < 15){
            while ($_SESSION[$dealer_name] < 15){
                $dealer->set_hit($dealer_name);
            }
        }
        echo $dealer_name. " has ". $_SESSION[$dealer_name]."<br>";

        //function endgame(){
            if ($player->keepscore($player_name) > $dealer->keepscore($dealer_name)) {
                echo $win = "You win!";
            } elseif ($player->keepscore($player_name) == $dealer->keepscore($dealer_name)) {
                echo $tie = "Tied scores - Dealer wins";
            } else {
                echo $lose = "Dealer wins";
            }
            //array_push($endgame, $win, $tie, $lose);
      //  }
    }
}

if (isset($_POST["surrender"])) {
    echo "dealer wins!";
}


//$player->get_score($player->set_hit());
