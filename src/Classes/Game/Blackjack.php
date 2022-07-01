<?php

namespace App\Classes\Game;

class Blackjack
{
    public $blackjack = 21;

    public function __construct()
    {
        $this->player = new Player();
        $this->dealer = new Player('dealer');
    }

    /**
     * Reset player scores and shuffle deck
     * @static
     * @access public
     * @return void
     */
    public function reset()
    {
        $this->player->clearCurrentHand();
        $this->dealer->clearCurrentHand();
    }
}
