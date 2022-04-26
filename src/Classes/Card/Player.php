<?php

namespace App\Classes\Card;

class Player
{
    public function __construct()
    {
        $this->cardHand = array();
        // $this->playerNum = 0;

        // $this->playerNum++;
    }

    // /**
    //  * Show player number
    //  * @return arrays
    //  */
    // public function getPlayerNum()
    // {
    //     return $this->playerNum;
    // }

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
     * draw N numbers of cards from currentDeck
     * @param int
     * @param array
     */
    public function drawCardsFromDeck($numberOfCards, $deck) {

        $drawnCards = $deck->drawCards($numberOfCards);
        $currentCardHand = $this->getCardHand();
        $updatedHand = array_merge($currentCardHand, $drawnCards);

        $this->setCardHand($updatedHand);
    }
}
