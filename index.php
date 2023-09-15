<?php

// - Full deck of cards (with suits) (?array)
    //- shuffle deck
    //- Deal out 2 cards to each player
//- calculate each players score
//- declare winner if one has higher score and <= 21
//- if any player >21 - other player wins
//- if equal score or both >21 - declare a draw

//hearts, clubs, diamonds, spades
$cards = [2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'A'];
$suits = ['hearts', 'clubs', 'diamonds', 'spades'];
$fullDeck = [];

foreach ($cards as $card) {
    foreach ($suits as $suit) {
        $fullDeck[] = $card . ' of ' . $suit;
    }
}
echo '<pre>';
print_r($fullDeck);
echo '</pre>';

//shuffle deck

$shuffledFullDeck = $fullDeck;
shuffle($shuffledFullDeck);

echo '<pre>';
print_r($shuffledFullDeck);
echo '</pre>';

//deal cards to players

$player1Cards = [$shuffledFullDeck[0], $shuffledFullDeck[1]];
$player2Cards = [$shuffledFullDeck[2], $shuffledFullDeck[3]];

echo '<pre>';
print_r($player1Cards);
echo '</pre>';

echo '<pre>';
print_r($player2Cards);
echo '</pre>';
