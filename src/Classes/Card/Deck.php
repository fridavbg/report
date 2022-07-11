<?php

namespace App\Classes\Card;

use App\Classes\Card\Card;
class Deck
{
    /**
     * @property array<object, Card> $cards
     * 
     * @property array<object, Card> $cardHand 
     * 
     * @property array<string> $suits
     * @property array<string> $values
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
     * @return array<Card>
     */
    public function createDeck(): array
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
     * @return array<Card>
     */
    public function getDeck(): array
    {
        return $this->cards;
    }

    /**
     * Deck Var Setter
     * @param array<Card> $cards
     */
    public function setDeck(array $cards): void
    {
        $this->cards = $cards;
    }

    /**
     * Show cardHand
     * @return array<Card>
     */
    public function getCardHand(): array
    {
        return $this->cardHand;
    }

    /**
     * cardHand Var Setter
     * @param array<Card> $cards
     */
    public function setCardHand(array $cards): void
    {
        $this->cardHand = $cards;
    }

    /**
     * Shuffle deck of cards
     * @return bool|array<object>
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
     * @param int $numberOfCards
     * @return array<object>
     */

    public function getCards(int $numberOfCards)
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
     * @return Card
     */

    public function getCardForPlayer(int $numberOfCards): Card
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
