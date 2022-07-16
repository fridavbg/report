<?php

namespace App\Classes\Card;

class Deck2 extends Deck
{
    /**
     * Class the inherits deck and adds Jokers
     */

    /**
     * @var array<string> $suits
     */
    protected array $suits;
    /**
     * @var array<string> $values
     */
    protected array $values;

    public function jokers(): void
    {
        $this->suits = array('Black', 'Red');
        $this->values = array(
            'Joker'
        );
        $this->createDeck2();
    }

    /**
     * Loop through to create Deck of cards
     * @return array<Card>
     */
    public function createDeck2(): array
    {
        foreach ($this->suits as $suit) {
            foreach ($this->values as $value) {
                $card = new Card($suit, $value);
                array_push($this->cards, $card);
            }
        }
        return $this->cards;
    }

    /**
     * Shows card value
     * @return array<string>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * Shows card value
     * @return array<string>
     */
    public function getSuits(): array
    {
        return $this->suits;
    }
}
