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
        $this->deck = new Deck();
        $this->playersWithCardHands = array();
        $this->amountOfDrawnCards = intval($numOfCards) * intval($numOfPlayers);
    }

    public function startGame()
    {
        $cardHands = [];
        for ($i = 0; $i < $this->players; $i++) {
            // Shuffle Deck
            $this->deck->shuffleDeck();
            // Draw Cards to card Hand
            $drawnCards = $this->deck->getCards($this->cards);
            if ($i < 1) {
                array_push($cardHands, $drawnCards);
            } elseif ($i >= 1) {
                array_push($cardHands, array_splice($drawnCards, $this->cards * $i));
            }
        }
        return $cardHands;
    }
}
