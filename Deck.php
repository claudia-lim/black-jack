<?php

class Deck
{
    private array $deck;
    private array $shuffledDeck;

    public function __construct(array $cards)
    {
        $this->deck = $cards;
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