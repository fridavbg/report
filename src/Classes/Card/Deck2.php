<?php

namespace App\Classes\Card;

class Deck2 extends Deck
{
    /**
     * Class the inherits deck and adds Jokers
     */
    public function jokers(): void
    {
        $suits = array('Black', 'Red');
        $values = array(
            'Joker'
        );
        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $card = new Card($suit, $value);
                array_push($this->cards, $card);
            }
        }
    }
}
