<?php
//require 'index.php';
//initiating players/dealer
$player_name = 'Player';
$dealer_name = 'Dealer';
$player = new Blackjack($player_name);
$dealer = new Blackjack($dealer_name);
$player2_name = 'Player2';
$player2 = new Blackjack($player2_name);

if (isset($_POST["newGame"])) {
    $player->newGame($player_name);
    $dealer->newGame($dealer_name);
    $player2->newGame($player2_name);
}

//Deal button
if (isset($_POST["deal"])) {
   $dealOutput = $player->set_firstDeal($player_name);
    $player2->set_firstDeal($player2_name);
}
else {
    $dealOutput = array("", "", "");
}

//Hit button for players
if (isset($_POST["hit"])) {
    $hitOutput = $player->set_hit($player_name);
    $player2->set_hit($player2_name);
}
else {
    $hitOutput = array("", "", "");
}


if (isset($_POST["stand"])) {

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $endgame = array();
    if (isset($_POST["stand"])) {
        $dealer->stand($dealer_name);
        echo $dealer_name. " has ". $_SESSION[$dealer_name]."<br>";

        //function endgame(){
            if ($player->keepscore($player_name) > $dealer->keepscore($dealer_name) && $player->keepscore($player_name) <22) {
                echo $win = "You win!";
            } elseif ($player->keepscore($player_name) == $dealer->keepscore($dealer_name)) {
                echo $tie = "Tied scores - Dealer wins";
            } elseif ($dealer->keepscore($dealer_name) > 21 && $player->keepscore($player_name) <22){
                echo "Dealer busts ". $player_name. " wins";
            }
            else {
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
