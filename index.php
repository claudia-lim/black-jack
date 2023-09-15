<?php

// - Full deck of cards (with suits) (?array)
//- shuffle deck
//- Deal out 2 cards to each player
//- calculate each players score
//- declare winner if one has higher score and <= 21
//- if any player >21 - other player wins
//- if equal score or both >21 - declare a draw

function dealCard(array $fullDeck): string
{
    $shuffledFullDeck = $fullDeck;
    shuffle($shuffledFullDeck);
    return array_pop($shuffledFullDeck);
}

function createPlayerHand(): array
{
    global $fullDeck;
    for ($i = 0; $i < 2; $i++) {
        $playerCards[] = dealCard($fullDeck);
    }
    foreach ($playerCards as $playerCard) {
        $player[] = explode(',', $playerCard);
    }
    return $player;
}

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

//make deck
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

$player1Hand = createPlayerHand();
$player2Hand = createPlayerHand();

//calculate score
$player1Score = 0;
$player2Score = 0;

echo '<pre>';
print_r($player1Hand);
echo '</pre>';

echo '<pre>';
print_r($player2Hand);
echo '</pre>';

$player1Score = calcScore($player1Hand);
echo '<p>Player 1 score: ' . $player1Score . '</p>';

$player2Score = calcScore($player2Hand);
echo '<p>Player 2 score: ' . $player2Score . '</p>';

//decide winner/draw

if (($player1Score > 21) && ($player2Score > 21)) {
    echo '<p>Both players are bust!</p>';
} elseif (($player1Score > 21) && !($player2Score > 21)) {
    echo '<p>Player 1 is bust, Player 2 wins!</p>';
} elseif (($player2Score > 21) && !($player1Score > 21)) {
    echo '<p>Player 2 is bust, Player 1 wins!</p>';
} elseif ($player1Score > $player2Score) {
    echo '<p>Player 1 wins!</p>';
} elseif ($player2Score > $player1Score) {
    echo '<p>Player 2 wins!</p>';
} elseif ($player1Score == $player2Score) {
    echo '<p>It\'s a draw!</p>';
} else {
    echo '<p>Something has gone wrong...</p>';
}