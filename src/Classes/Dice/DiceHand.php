<?php

namespace App\Classes\Dice;

use App\Classes\Dice\Dice;

class DiceHand
{
    /**
     * @var array<Dice> $hand
     */
    private array $hand = [];

    public function add(Dice $die): void
    {
        $this->hand[] = $die;
    }

    public function roll(): void
    {
        foreach ($this->hand as $die) {
            $die->roll();
        }
    }

    public function getNumberDices(): int
    {
        return count($this->hand);
    }

    public function getAsString(): string
    {
        $str = "";
        foreach ($this->hand as $die) {
            $str .= $die->getAsString();
        }
        return $str;
    }
}
