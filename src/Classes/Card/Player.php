<?php

namespace App\Classes\Card;

class Player
{
    /**
     * Rules of the Game
     * Track num of players
     */
    public function __construct($numOfPlayers, $numOfCards)
    {
        $this->cards = $numOfCards;
        $this->players = $numOfPlayers;
        $this->startGame();
        $this->cardHand = new Deck();
    }

    public function startGame()
    {
        for ($i = 0; $i < $this->players; $i++) { 
                // set cardHand - Deck.getCards($numOfCards)
                // size players x cardsInCardHand < 52
        // shuffle deck if needed 
        }
    }
}
