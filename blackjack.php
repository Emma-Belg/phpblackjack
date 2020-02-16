<?php
//initiating players/dealer
$player_name = 'Player';
$dealer_name = 'Dealer';
$player = new Blackjack($player_name);
$dealer = new Blackjack($dealer_name);

//Deal button
if (isset($_POST["deal"])) {
    $player->set_firstDeal($player_name);
}

//Hit button for players
if (isset($_POST["hit"])) {
    $player->set_hit($player_name);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["stand"])) {
        $dealer->set_firstDeal($dealer_name);
        $dealer->stand($dealer_name);
        if ($player->keepscore($player_name) > $dealer->keepscore($dealer_name)) {
            $win = "You win!";
        }
        elseif ($player->keepscore($player_name) == $dealer->keepscore($dealer_name)){
            $tie = "Tied scores - Dealer wins";
        } else {
            $lose = "Dealer wins";
        }
    }
}







//$player->get_score($player->set_hit());
