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

    //public $person;
    public function __construct($person)
    {

        if (!isset($_SESSION[$person])) {
            $_SESSION[$person] = 0;
            $this->score = $_SESSION[$person];
        }
    }

    /*    public function __construct($person)
        {
            $this->person = $person;
            if(isset($_SESSION[$person])){
                $this->score = $_SESSION[$person];
            }
        }*/

    public $newcard;
    public $firstcard;
    public $secondcard;
    public $cardsonTable = array();
    public $minCard = 1;
    public $maxCard = 11;


    public function set_firstDeal($person)
    {
        if (isset($_POST["deal"])) {
            $this->firstcard = rand($this->minCard, $this->maxCard);
            $this->secondcard = rand($this->minCard, $this->maxCard);
            $this->score = $this->firstcard + $this->secondcard;
            array_push($this->cardsonTable, $this->firstcard + $this->secondcard);
            echo $person . "'s fist two cards are: " . $this->firstcard . " and " . $this->secondcard . "<br>";
            echo $person . "'s total is " . $this->score . "<br>";
            $_SESSION[$person] = $this->score;
            return $_SESSION[$person];
        }
    }

    public function set_hit($person)
    {
        if (isset($_POST["hit"])) {
            $this->newcard = rand($this->minCard, $this->maxCard);
            $_SESSION[$person] = $_SESSION[$person] + $this->newcard;

            if ($_SESSION[$person] <= 21) {
                //array_push($this->cardsonTable, $_SESSION[$person]);
                echo "Next card is " . $this->newcard . "<br>";
                echo $person . "'s total is " . $_SESSION[$person];
            } else {
                echo "Next card is " . $this->newcard . "<br>";
                echo $person . "'s total is " . $_SESSION[$person] . "<br>";
                echo "Bust!";
            }
        }
        return  $_SESSION[$person];
    }

    public function keepscore($person)
    {
        return $_SESSION[$person];
    }


   public function stand($person)
    {
        if (isset($_POST["stand"])) {
            while ($_SESSION[$person] > 15){
                $person->set_hit($person);
            }

        }

    }


}





