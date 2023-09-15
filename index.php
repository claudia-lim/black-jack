<?php

// - Full deck of cards (with suits) (?array)
//- shuffle deck
//- Deal out 2 cards to each player
//- calculate each players score
//- declare winner if one has higher score and <= 21
//- if any player >21 - other player wins
//- if equal score or both >21 - declare a draw

function dealCards(array $fullDeck, int $playerCount): array
{
    $shuffledFullDeck = $fullDeck;
    shuffle($shuffledFullDeck);
    $dealCards = array_rand($shuffledFullDeck, $playerCount * 2);
    foreach ($dealCards as $card) {
        $dealtCards[] = $shuffledFullDeck[$card];
    }
    return $dealtCards;
}


function createPlayerHand(array $playerCards): array
{
    foreach ($playerCards as $playerCard) {
        $player[] = explode(',', $playerCard);
    }
    return $player;
}

//$cardsPoints = [2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10, 'J'=>10, 'Q'=>10, 'K'=>10, 'A'=>11];
$cardTypes = [2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'A'];
$suits = ['hearts', 'clubs', 'diamonds', 'spades'];
$fullDeck = [];
foreach ($suits as $suit) {
    foreach ($cardTypes as $cardType) {
        $fullDeck[] = $cardType . ',' . $suit;
    }
}
//echo '<pre>';
//print_r($fullDeck);
//echo '</pre>';

$dealtCards = dealCards($fullDeck, 2);

//echo '<pre>';
//print_r($dealtCards);
//echo '</pre>';

$player1Cards = [$dealtCards[0], $dealtCards[1]];
$player2Cards = [$dealtCards[2], $dealtCards[3]];

//echo '<pre>';
//print_r($player1Cards);
//echo '</pre>';
//
//echo '<pre>';
//print_r($player2Cards);
//echo '</pre>';

$player1Hand = createPlayerHand($player1Cards);

echo '<p>Player 1 Hand: ' . $player1Hand[0][0] . ' of ' . $player1Hand[0][1] .
    ' and ' . $player1Hand[1][0] . ' of ' . $player1Hand[1][1] . '</p>';

$player2Hand = createPlayerHand($player2Cards);

echo '<p>Player 2 Hand: '. $player2Hand[0][0] . ' of ' . $player2Hand[0][1] .
    ' and ' . $player2Hand[1][0] . ' of ' . $player2Hand[1][1] . '</p>';

//calculate score
$player1Score = 0;
$player2Score = 0;


function calcScore(array $playerHand): int
{
    $playerScore = 0;
    foreach ($playerHand as $playerItem) {
        if (is_numeric($playerItem[0])) {
            $playerScore += $playerItem[0];
        } elseif ($playerItem[0] == 'A') {
            $playerScore += 11;
        } else {
            $playerScore += 10;
        }
    }
    return $playerScore;
}

$player1Score = calcScore($player1Hand);

echo '<p>Player 1 score: ' . $player1Score . '</p>';

$player2Score = calcScore($player2Hand);

echo '<p>Player 2 score: ' . $player2Score . '</p>';

//decide winner/draw

if (($player1Score > 21) && ($player2Score > 21)) {
    echo '<p>Both players are bust!</p>';
}
elseif (($player1Score >21) && !($player2Score > 21)) {
    echo '<p>Player 1 is bust, Player 2 wins!</p>';
}
elseif (($player2Score >21) && !($player1Score > 21)) {
    echo '<p>Player 2 is bust, Player 1 wins!</p>';
}
elseif ($player1Score > $player2Score) {
    echo '<p>Player 1 wins!</p>';
}
elseif ($player2Score > $player1Score) {
    echo '<p>Player 2 wins!</p>';
}
elseif ($player1Score == $player2Score) {
    echo '<p>It\'s a draw!</p>';
}
else {
    echo '<p>Something has gone wrong...</p>';
}