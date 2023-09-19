<?php
require_once 'Deck.php';
class Player
{
    private array $hand;
    private int $score=0;
    private string $name;


    public function __construct($name)
    {
        $this->name = $name;
    }

    public function dealHand($deck): void
    {
        $this->hand[] = $deck->dealCard();
        $this->hand[] = $deck->dealCard();
    }
    public function addCard($card): void
    {
        $this->hand[] = $card;
    }

    public function getHand(): string
    {
        $handArray = [];
        $handString = '';
        foreach ($this->hand as $card)
        {
            $handArray[] = $card->getCard();
        }
        foreach ($handArray as $card)
        {
             $handString .= '<p>' . $card . '</p>';
        }
        return $handString;

    }

    public function tallyScore(): int
    {
        foreach ($this->hand as $card)
        {
            $this->score += $card->getPoints();
        }

        return $this->score;
    }
}