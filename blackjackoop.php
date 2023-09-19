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

$cardTypes = [[2,2], [3,3], [4, 4], [5,5], [6,6], [7,7], [8,8], [9,9], [10,10], ['J',10], ['Q',10], ['K',10], ['A',11]];
$suits = ['hearts', 'clubs', 'diamonds', 'spades'];
$points = [2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10, 11];
$deck = [];
//echo '<pre>';
//print_r($cardTypes);
//echo '</pre>';

foreach ($suits as $suit) {
    foreach ($cardTypes as $cardType)
    {
        $deck[] = ['suit'=>$suit, 'type'=>$cardType[0],'points'=>$cardType[1]];
    }
}

$cardsObjArray = [];
foreach ($deck as $individualCard){
    $cardsObjArray[] = new Card($individualCard['suit'], $individualCard['type'], $individualCard['points']);
}

$deckObj = new Deck($cardsObjArray);

$shuffledDeck = $deckObj->shuffle();

$firstCard = $deckObj->dealCard();

echo $firstCard->getCard();

$secondCard = $deckObj->dealCard();

//create Player
$player1 = new Player('Player One');
$player1->addCard($firstCard);
$player1->addCard($secondCard);
$player1Hand = $player1->getHand();
echo '<pre>';
print_r($player1Hand);
echo '</pre>';



