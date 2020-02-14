<?php
$player_name = 'Player';
$dealer_name = 'Dealer';

$player = new Blackjack($player_name);
$player->set_firstDeal($player_name);
$player->set_hit($player_name);

//$player->get_score($player->set_hit());
