<?php

namespace App\Classes\Card;

class Card
{
    /**
     * @var string $suit
     * @var string $value
     */
    protected string $suit;
    protected string $value;

    public function __construct(string $suit, string $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    /**
     * Shows card value
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Shows card value
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * Show card suit
     * @return string
     */
    public function getSuite()
    {
        return $this->suit;
    }

    /**
     * Show card as a object
     * @return array<string, string>.
     */
    public function getCardObj()
    {
        $cardObj = ["suit" => $this->suit,"value" => $this->value];
        return $cardObj;
    }
}
