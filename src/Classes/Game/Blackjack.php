<?php

namespace App\Classes\Game;

use App\Classes\Card\Deck;

class Blackjack
{
    public function __construct()
    {
        $this->player = new Player();
        $this->dealer = new Player('Dealer');
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
        $this->deck = new Deck();
    }

    /**
     * Determine which player has blackJack
     * @static
     * @access public
     * @return void
     */
    public function blackJack()
    {
        $playerPoints = $this->player->getCurrentScore();
        $dealerPoints = $this->dealer->getCurrentScore();

        if ($playerPoints >= $dealerPoints || $dealerPoints == 21) {
            $this->dealer->win();
        } else {
            $this->player->win();
        }
    }
}
