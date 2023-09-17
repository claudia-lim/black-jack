<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Black Jack</title>

    <meta name="description" content="Black Jack">
    <meta name="author" content="Claudia Lim">

    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/styles.css">

    <!--<style>-->
    <!--    .player1 {-->
    <!--        color: purple;-->
    <!--    }-->
    <!--    .player2 {-->
    <!--        color: orange;-->
    <!--    }-->

    <!--</style>-->
    <!-- <script defer src="js/index.js"></script> -->
</head>

<body>

<h1>Black Jack</h1>

<?php

function createPlayerHand(): array
{
    global $shuffledFullDeck;
    for ($i = 0; $i < 2; $i++) {
        $playerCards[] = array_pop($shuffledFullDeck);
    }
    foreach ($playerCards as $playerCard) {
        $playerHand[] = explode(',', $playerCard);
    }
    return $playerHand;
}

function calcScore(array $playerHand): int
{
    $playerScore = 0;
    foreach ($playerHand as $playerCard) {
        $playerScore += calcCardScore($playerCard);
    }
    return $playerScore;
}

function calcCardScore(array $card): int
{
    $cardScore = 0;
    if (is_numeric($card[0])) {
        $cardScore += $card[0];
    } elseif ($card[0] == 'A') {
        $cardScore += 11;
    } else {
        $cardScore += 10;
    }
    return $cardScore;
}

function checkScore14(int $playerScore, array $playerHand): int
{
    global $shuffledFullDeck;
    if ($playerScore < 14) {
        echo '<p>Score less than 14 so extra card dealt:</p>';
        $extraCard = array_pop($shuffledFullDeck);
        $extraCardItem = explode(',', $extraCard);
        echo '<p>' . $extraCardItem[0] . ' of ' . $extraCardItem[1] . '</p>';
//        $playerHand[] = $extraCardItem;
//        $playerScore = calcScore($playerHand);
//

        $playerScore += calcCardScore($extraCardItem);

        echo '<p>Updated score: ' . $playerScore . '</p>';
        return $playerScore;
    } else {
        return $playerScore;
    }
}

function winner(int $score1, int $score2): string
{
    if (($score1 > 21) && ($score2 > 21)) {
        return '<p>Both players are bust!</p>';
    } elseif (($score1 > 21) && !($score2 > 21)) {
        return '<p>Player 1 is bust, Player 2 wins!</p>';
    } elseif (($score2 > 21) && !($score1 > 21)) {
        return '<p>Player 2 is bust, Player 1 wins!</p>';
    } elseif ($score1 > $score2) {
        return '<p>Player 1 wins!</p>';
    } elseif ($score2 > $score1) {
        return '<p>Player 2 wins!</p>';
    } elseif ($score1 == $score2) {
        return '<p>It\'s a draw!</p>';
    } else {
        return '<p>Something has gone wrong...</p>';
    }
}

//make shuffled deck
$cardTypes = [2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'A'];
$suits = ['hearts', 'clubs', 'diamonds', 'spades'];
$fullDeck = [];
foreach ($suits as $suit) {
    foreach ($cardTypes as $cardType) {
        $fullDeck[] = $cardType . ',' . $suit;
    }
}

$shuffledFullDeck = $fullDeck;
shuffle($shuffledFullDeck);

$player1Hand = createPlayerHand();
$player2Hand = createPlayerHand();

echo '<h3>Player 1</h3>';
foreach ($player1Hand as $playerHandCards) {
    echo '<p>' . $playerHandCards[0] . ' of ' . $playerHandCards[1] . '</p>';
}
$player1Score = calcScore($player1Hand);
echo '<p>Player 1 score: ' . $player1Score . '</p>';

$player1Score = checkScore14($player1Score, $player1Hand);


echo '<h3>Player 2</h3>';
foreach ($player2Hand as $playerHandCards) {
    echo '<p>' . $playerHandCards[0] . ' of ' . $playerHandCards[1] . '</p>';
}
$player2Score = calcScore($player2Hand);
echo '<p>Player 2 score: ' . $player2Score . '</p>';

$player2Score = checkScore14($player2Score, $player2Hand);

echo '<h3>Results:</h3>';
echo winner($player1Score, $player2Score);
?>

</body>
</html>
