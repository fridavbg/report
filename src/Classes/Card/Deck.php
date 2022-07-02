<?php

namespace App\Classes\Card;

class Deck
{
    /**
     * @var array representing full deck of cards with Jokers
     * @var array representing deck excluding player cards picked
     */
    protected $cards; // DECK
  //  protected $cardHand; // CARDS DRAWN

    /**
     * Create a deck of 52 cards
     */
    public function __construct()
    {
       // $this->cardHand = array();
        $this->cards = array();
        $this->suits = array('H', 'C', 'D', 'S');
        $this->values = array(
            'A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'
        );
        $this->createDeck();
    }

    /**
     * Loop through to create Deck of cards
     */
    public function createDeck()
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
     * Show Deck of cards
     * @return array
     */
    public function getDeck()
    {
        return $this->cards;
    }

    /**
     * Deck Var Setter
     * @param mixed $deck
     */
    public function setDeck($cards)
    {
        $this->cards = $cards;
    }

    // /**
    //  * Show cardHand
    //  * @return arrays
    //  */
    // public function getCardHand()
    // {
    //     return $this->cardHand;
    // }

    // /**
    //  * cardHand Var Setter
    //  * @param array $deck
    //  */
    // public function setCardHand($cards)
    // {
    //     $this->cardHand = $cards;
    // }

    /**
     * Shuffle deck of cards
     * @return bool|array
     */
    public function shuffleDeck()
    {
        $cards = $this->getDeck();

        if (shuffle($cards)) {
            $this->setDeck($cards);
            return $cards;
        }
        return shuffle($cards);
    }

    /**
     * Grab N numbers of random cards from deck & update leftOverDeck
     * @param $numberOfCards int
     * @return cardHand array
     */

    public function getCards($numberOfCards)
    {
        $drawnCards = [];
        shuffle($this->cards);
        for ($i = 0; $i < $numberOfCards; $i++) {
            array_push($drawnCards, array_shift($this->cards));
        }
        // remove cardHand from deck
        // $currentCardHand = $this->getCardHand();
        // $updatedDeck = array_merge($currentCardHand, $drawnCards);
        // $this->setCardHand($updatedDeck);
        // return $this->getCardHand();
        $this->setDeck($this->cards);

        return $drawnCards;
    }

    /**
     * Return each card as a Object
     */
    public function getJson()
    {
        $jsonDeck = [];
        $deckCards = $this->getDeck();
        foreach ($deckCards as $card) {
            array_push($jsonDeck, $card->getCardObj());
        }
        return json_encode($jsonDeck, JSON_PRETTY_PRINT);
    }
}
