<?php

namespace App\Classes\Card;

class Deck
{
    /**
     * @var array representing full deck of cards
     * @var array representing deck excluding player cards picked
     */
    protected $cards; // DECK

    /**
     * Create a deck of 52 cards
     */
    public function __construct()
    {
        $this->cards = array();
        $suits = array('H', 'C', 'D', 'S');
        $values = array(
            'A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'
        );

        /**
         * Loop through to create Deck of cards
         */
        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $card = new Card($suit, $value);
                array_push($this->cards, $card);
            }
        }
        shuffle($this->cards);
    }

    /**
     * Show Deck of cards
     * @return array
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Deck Var Setter
     * @param mixed $deck
     */
    public function setCards($cards)
    {
        $this->cards = $cards;
    }

    /**
     * Shuffle deck of cards
     * @return array
     */
    public function shuffleDeck()
    {
        $deckCards = $this->getCards();
        if (shuffle($deckCards)) {
            $this->setCards($deckCards);
            return $deckCards;
        }
        // $deckCards is empty
    }

    /**
     * Grab N numberOfCards of random cards from deck & update leftOverDeck
     * @param int
     * @return array
     */

    public function drawCards($numberOfCards)
    {
        $drawnCards = [];

        shuffle($this->cards);
        for ($i = 0; $i < $numberOfCards; $i++) {
            if (count($this->cards) > 0) {
                array_push($drawnCards, array_shift($this->cards));
            }
        }
        return $drawnCards;
    }
}
