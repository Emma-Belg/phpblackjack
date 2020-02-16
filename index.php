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
    public $score = 0;
    public $person;

    //public $person;
    public function __construct($person)
    {

        if (!isset($_SESSION[$person])) {
            $_SESSION[$person] = 0;
            $this->score = $_SESSION[$person];
        }
    }

    public $newcard;
    public $firstcard;
    public $secondcard;
    public $hitting;
    public $minCard = 1;
    public $maxCard = 11;
    public $bust;
    public $disabled;


    public function set_firstDeal($person)
    {
        $cardsonTable = array();
        if (!isset($_SESSION[$person])){
            $_SESSION[$person] = 0;
        }
            $this->firstcard = rand($this->minCard, $this->maxCard);
            $this->secondcard = rand($this->minCard, $this->maxCard);
            $this->score = $this->firstcard + $this->secondcard;
            echo $person . "'s fist two cards are: " . $this->firstcard . " and " . $this->secondcard . "<br>";
            echo $person . "'s total is " . $this->score . "<br>";
            $_SESSION[$person] = $this->score;
        if (isset($_SESSION[$person])){
            $this->disabled = "disabled";
        }
        array_push($cardsonTable, $this->firstcard + $this->secondcard, $this->disabled );
        implode("", $cardsonTable);
            return $cardsonTable;
    }

    public function set_hit($person)
    {
            $this->newcard = rand($this->minCard, $this->maxCard);
            $_SESSION[$person] = $_SESSION[$person] + $this->newcard;
            $hitArr = array();
            if ($_SESSION[$person] <= 21) {
                //array_push($this->cardsonTable, $_SESSION[$person]);
                $this->hitting = "Next card is " . $this->newcard . "<br>".$person . "'s total is " . $_SESSION[$person];
            } else {
                $this->bust = "Next card is " . $this->newcard . "<br>".$person . "'s total is " . $_SESSION[$person] . "<br> Bust!";
                $this->disabled = "disabled";
            }
            array_push($hitArr, $this->hitting, $this->bust, $this->disabled, $_SESSION[$person]);
            implode("", $hitArr);
            return $hitArr;
    }

    public function keepscore($person)
    {
        return $_SESSION[$person];
    }


   public function stand($person)
    {
        if (isset($_POST["stand"])) {
                   do {
            $this->set_hit($person);
        } while ($this->keepscore($person) < 15);
            return $_SESSION[$person];
        }

    }

/*    public function stand($person)
    {
        if (isset($_POST["stand"])) {
            if ($_SESSION[$person] < 15){
                while ($_SESSION[$person] < 15){
                    $this->person->set_hit($person);
                }
            }
            echo $person. " has ". $_SESSION[$person]."<br>";
            return $_SESSION[$person];
        }

    }*/

//Wanted to just set the session and score to 0 but it kept randomising cards so I had to add in all the extras
    public function newGame($person){
        if (isset($_SESSION[$person])){
            $this->score = 0;
            $this->newcard = 0;
            $this->minCard = 0;
            $this->maxCard = 0;
            $_SESSION[$person] = 0;
        }

    }

}






