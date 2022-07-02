<?php

namespace App\Classes\Game;

use App\Classes\Card\Deck;

class Blackjack
{
    public $blackjack = 21;

    public function __construct()
    {
        $this->player = new Player();
        $this->dealer = new Player('dealer');
        $this->deck = new Deck();
    }

    /**
     * Reset player scores for a new round
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
