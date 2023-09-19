<?php

class Card
{
    private string $suit;
    private string $type;
    private int $points = 0;


    public function __construct(string $suit, string $type, int $points)
    {
        $this->suit = $suit;
        $this->type = $type;
        $this->points = $points;
    }

    public function getCard(): string{
        return $this->type . ' of ' . $this->suit;
    }

    public function getPoints(): int {
        return $this->points;
    }
}