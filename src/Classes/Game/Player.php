<?php

namespace App\Classes\Game;

use App\Classes\Game\PlayerActions;
use App\Classes\Card\Deck;

class Player implements PlayerActions
{

    protected $type;
    protected $currentHand;
    protected $currentScore;
    protected $totalWins;

    public function __construct(string $type = 'player')
    {
        $this->type = $type;
        $this->currentHand = [];
        $this->currentScore = 0;
        $this->totalWins = 0;
    }

    /**
     * Player cardHand getter
     * @access public
     * @return array
     */
    public function getCurrentCardHand()
    {
        return $this->currentHand;
    }

    /**
     * cardHand Var Setter
     * @param array $deck
     */
    public function setCurrentCardHand($cards)
    {
        $this->currentHand = $cards;
    }

    /**
     * Player draws one card from current Deck.
     * @return void
     */
    public function draw($deck)
    {
        $newCardHand = array();
        $currentCardHand = $this->getCurrentCardHand();
        $drawnCard = $deck->getCards(1);
        array_push($newCardHand, $drawnCard);
        $updatedCardHand = array_merge($newCardHand, $currentCardHand);
        $this->setCurrentCardHand($updatedCardHand);
        // dd($this->getCurrentCardHand());
    }

    /**
     * Switch type (player)
     * @access public
     * @return void
     */
    public function stop()
    {
        return 'next players turn';
    }

    /**
     * Increment the player's or the dealer's total
     * score by one, depending who is closest to 21
     * @access public
     * @return void
     */
    public function win()
    {
        $this->totalWins++;
    }

    /**
     * TotalWins getter
     * @access public
     * @return integer
     */
    public function getTotalWins()
    {
        return $this->totalWins;
    }
    /**
     * Reset current cardHand and score
     * to start a new round
     * @access public
     * @return void
     */
    public function clearCurrentHand()
    {
        $this->currentHand = [];
        $this->currentScore = 0;
    }

    /**
     * Check for player type
     * @access public
     * @return string $type Player or dealer
     */
    public function getPlayer()
    {
        return $this->type;
    }
}
