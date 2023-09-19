<?php
require_once 'Card.php';
class Deck
{
    private array $deck;
    private array $shuffledDeck;

    public function __construct()
    {
        $cardTypes = [[2,2], [3,3], [4, 4], [5,5], [6,6], [7,7], [8,8], [9,9], [10,10], ['J',10], ['Q',10], ['K',10], ['A',11]];
        $suits = ['hearts', 'clubs', 'diamonds', 'spades'];
        $deck = [];

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
        $this->deck = $cardsObjArray;
    }

    public function shuffle(): array
    {
        $this->shuffledDeck = $this->deck;
        shuffle($this->shuffledDeck);
        return $this->shuffledDeck;
    }

    public function dealCard(): Card
    {
        $dealtCard = array_pop($this->shuffledDeck);
        return $dealtCard;
    }

    public function getDeck() : array
    {
        return $this->shuffledDeck;
    }

}