<?php

namespace App\Classes\Game;

use App\Classes\Game\PlayerActions;

class Player implements PlayerActions
{

    protected $typeOfPlayer;
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
     * A winner is determined and this method will either increment the player's or the dealer's total
     * score by one.
     * @access public
     * @return void
     */
    public function win()
    {
        $this->totalWins++;
    }


    /**
     * Called whenever a new game has started.  The player and the dealer essentially hand over their
     * previously-played hand and their card score; naturally, is zero.
     * @access public
     * @return void
     */
    public function clearCurrentHand()
    {
        $this->currentHand = [];
        $this->currentScore = 0;
    }
}
