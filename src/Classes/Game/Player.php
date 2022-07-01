<?php

namespace App\Classes\Game;

use App\Classes\Game\PlayerActions;

class Player implements PlayerActions
{

    protected $type;
    protected $currentHand;
    protected $currentScore;
    protected $totalWins;

    public function __construct(string $type = 'player')
    {
        if ($type !== 'player' && $type !== 'dealer') {
            throw new \Exception('Invalid player type.');
        }

        $this->type = $type;
        $this->currentHand = [];
        $this->currentScore = 0;
        $this->totalWins = 0;
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
     * Once the player stands, the dealer will draw
     * Check for active player
     * @access public
     * @return string $type Player or dealer
     */
    public function getPlayer()
    {
        return $this->type;
    }
}
