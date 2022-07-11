<?php

namespace App\Classes\Card;

class Deck
{
    /**
     * @var array<string, Card> $cards representing full deck of cards
     * @var array<string, Card> $cardHand representing cardHand for a player
     * @var array<string, String> $suits representing full deck of cards
     * @var array<string, String> $values representing value of a card
     */
    
    protected array $cards; 
    protected array $cardHand;
    protected array $suits;
    protected array $values;

    /**
     * Create a deck of 52 cards
     */
    public function __construct()
    {
        $this->cardHand = array();
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

    /**
     * Show cardHand
     * @return arrays
     */
    public function getCardHand()
    {
        return $this->cardHand;
    }

    /**
     * cardHand Var Setter
     * @param array $cards
     */
    public function setCardHand($cards)
    {
        $this->cardHand = $cards;
    }

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
     * Grab N numbers of random cards from deck & update cardHand & leftOverDeck
     * @param $leftOverDeck array
     * @param $numberOfCards int
     */

    public function getCards($numberOfCards)
    {
        $drawnCards = [];
        shuffle($this->cards);
        for ($i = 0; $i < $numberOfCards; $i++) {
            array_push($drawnCards, array_shift($this->cards));
        }
        $this->setDeck($this->cards);
        $currentCardHand = $this->getCardHand();
        $updatedDeck = array_merge($currentCardHand, $drawnCards);
        $this->setCardHand($updatedDeck);
        return $this->getCardHand();
    }

    /**
     * Grab one random card from deck & update a players cardHand
     * @param $numberOfCards int
     * @return cardHand array
     */

    public function getCardForPlayer($numberOfCards)
    {
        $drawnCards = [];
        shuffle($this->cards);
        for ($i = 0; $i < $numberOfCards; $i++) {
            array_push($drawnCards, array_shift($this->cards));
        }
        $this->setDeck($this->cards);
        return $drawnCards[0];
    }


    /**
     * Return each card as a Object
     */
    public function getJson() : string
    {
        $jsonDeck = [];
        $deckCards = $this->getDeck();
        foreach ($deckCards as $card) {
            array_push($jsonDeck, $card->getCardObj());
        }
        return json_encode($jsonDeck, JSON_PRETTY_PRINT);
    }
}
