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

$deckObj->shuffle();

//create Player
$player1 = new Player('Player One');
$player2 = new Player('Player Two');

echo '<h3>' . $player1->getName() . '</h3>';

$player1->dealHand($deckObj);
echo $player1->getHand();
$player1Score = $player1->tallyScore();

if ($player1Score < 14) {
    echo '<p>Points less than 14 - Deal another card</p>';
    $player1->addCard($deckObj);
    $player1Score = $player1->tallyScore();
    echo '<p>New hand: ' . $player1->getHand() . '</p>';
}
echo '<p>Player 1 Score: ' . $player1Score . '</p>';

echo '<h3>' . $player2->getName() . '</h3>';
$player2->dealHand($deckObj);
echo $player2->getHand();
$player2Score = $player2->tallyScore();

if ($player2Score < 14) {
    echo '<p>Points less than 14 - Deal another card</p>';
    $player2->addCard($deckObj);
    echo '<p>New hand: </p>';
    echo $player2->getHand();
    $player2Score = $player2->tallyScore();
}
echo '<p>Player 2 Score: ' . $player2Score . '</p>';

//Decide winner
echo '<h1>';
if (($player1Score > 21) && ($player2Score > 21)) {
    echo 'Both players are bust!';
} elseif (($player1Score > 21) && !($player2Score > 21)) {
    echo 'Player 1 is bust, Player 2 wins!';
} elseif (($player2Score > 21) && !($player1Score > 21)) {
    echo 'Player 2 is bust, Player 1 wins!';
} elseif ($player1Score > $player2Score) {
    echo 'Player 1 wins!';
} elseif ($player2Score > $player1Score) {
    echo 'Player 2 wins!';
} elseif ($player1Score == $player2Score) {
    echo 'It\'s a draw!';
} else {
    echo 'Something has gone wrong...';
}
echo '</h1>';