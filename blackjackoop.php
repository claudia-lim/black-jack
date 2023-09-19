<?php
require_once 'Card.php';
require_once 'Deck.php';
require_once 'Player.php';
//OOP
//Classes needed:
    //card
//        - suit
//        - value
//          - points
    // deck of cards
//      - array of cards
//      - shuffle, deal
    // player hand - add card, calculate score



$deckObj = new Deck();

function extraCard(Player $player, $deck)
{
    $score = $player->tallyScore();
    if ($score < 14)
    {
        echo '<p>Player score less than 14, draw another card</p>';
        $player->addCard($deck->dealCard());
        echo '<p>Player hand is now: ' . $player->getHand() . '</p>';
        echo '<p>New score: ' . $player->tallyScore() . '</p>';
        return $player->tallyScore();
    }
}

$shuffledDeck = $deckObj->shuffle();

//create Player
$player1 = new Player('Player One');
$player2 = new Player('Player Two');

$player1->dealHand($deckObj);

$player2->dealHand($deckObj);

echo $player1->getHand();

//$player1Score = $player1->tallyScore();

echo '<p>Player 1 Score: ' . $player1->tallyScore() . '</p>';

extraCard($player1, $deckObj);


echo $player1->getHand();

//if ($player1Score < 14)
//{
//    echo '<p>Player less than 14, draw another card</p>';
//    $player1->addCard($deckObj->dealCard());
//    echo '<p>Player hand is now: ' . $player1->getHand() . '</p>';
//    $player1Score = $player1->tallyScore();
//}

$player2Hand = $player2->getHand();

echo '<p>Player 2</p>' . $player2Hand;

$player2Score = $player2->tallyScore();

echo '<p>Player 2 Score: ' . $player2Score . '</p>';

