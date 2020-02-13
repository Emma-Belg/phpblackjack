<?php
declare(strict_types=1);
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//whatIsHappening();

class Blackjack
{

    public $score;
    public $newcard;
    public $firstcard;
    public $secondcard;
    public $cardsonTable = array();
    public $minCard = 1;
    public $maxCard = 11;


    public function set_firstDeal(){
        if(isset($_POST["deal"])){
            $this->firstcard = rand($this->minCard, $this->maxCard);
            $this->secondcard = rand($this->minCard, $this->maxCard);
            $this->score = $this->firstcard + $this->secondcard;
            array_push($this->cardsonTable, $this->firstcard + $this->secondcard);
            echo "You were dealt a: ".$this->firstcard. " and ". $this->secondcard."<br>";
            echo "Your total is ".$this->score."<br>";
            $_SESSION["score"] = $this->score;
            return $_SESSION["score"];
        }
    }
    public function set_hit()
    {
        if (isset($_POST["hit"])) {
            $this->newcard = rand($this->minCard, $this->maxCard);
            $_SESSION["score"] = $_SESSION["score"] + $this->newcard;

            if ($_SESSION["score"] <= 21) {
                array_push($this->cardsonTable, $_SESSION["score"]);
                echo "You were dealt a ". $this->newcard . "<br>";
                echo "Your total is ".implode(" ", $this->cardsonTable);
            } else {
                echo "You were dealt a ". $this->newcard . "<br>";
                echo "Your total is ". $_SESSION["score"] . "<br>";
                echo "You lose!";
            }


            return $this->cardsonTable;
        }
    }


/*    public function get_score($newcard)
    {
        $score = $this->score + $newcard;
        echo $score;
    }*/

 /*   public function hit()
    {
        if (!empty($_POST["hit"])) {
            $newcard = $_POST["hit"];
            $addingScore = array();

            foreach ($newcard as $key => $amount) {
                $prodPrice = $products[$key]['price'];
                $addingPrice = $prodPrice * $amount;
                array_push($addingScore, $addingPrice);
            }
            $total = array_sum($addingScore);
            $totalValue = $total;
            if (!isset($_COOKIE["card"])) {
                setcookie("card", strval($totalValue));
            } else {
                $totalValue = $totalValue + $_COOKIE["card"];
                setcookie("card", strval($totalValue));
            }
            $totalValue = $_COOKIE["card"];
        } else {
            $totalValue = 0;
        }
    }*/


    /*    public function stand($score){
            $score = $this->score;
        }*/


}

$player = new Blackjack();
$player->set_firstDeal();
$player->set_hit();
//$player->get_score($player->set_hit());

$dealer = new Blackjack();


