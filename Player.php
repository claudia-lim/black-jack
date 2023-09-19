<?php

class Player
{
    private array $hand;
    private int $score=0;
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function addCard($card)
    {
        $this->hand[] = $card;
    }

    public function getHand()
    {
        foreach ($this->hand as $card)
        {
            print_r($card);
        }
    }

    public function tallyScore()
    {
        foreach ($this->hand as $card)
        {
            $this->score += $card['points'];
        }
        return $this->score;
    }
}