<?php
require_once 'Deck.php';
class Player
{
    private array $hand;
    private int $score;
    private string $name;


    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function dealHand($deck): void
    {
        $this->hand[] = $deck->dealCard();
        $this->hand[] = $deck->dealCard();
    }
    public function addCard($deck): void
    {
        $this->hand[] = $deck->dealCard();
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
             $handString .= '' . $card . ', ';
        }
        return $handString;
    }

    public function tallyScore(): int
    {
        $this->score = 0;
        foreach ($this->hand as $card)
        {
            $this->score += $card->getPoints();
        }

        return $this->score;
    }
}