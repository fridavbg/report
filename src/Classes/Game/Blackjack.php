<?php

namespace App\Classes\Game;

use App\Classes\Card\Deck;

use App\Classes\Game\PlayerRepository;

class Blackjack
{
    public function __construct()
    {
        $this->players = new PlayerRepository();
        $this->players->createPlayer('Player');
        $this->players->createPlayer('Dealer');
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
        $player = $this->players->findByType('Player');
        $dealer = $this->players->findByType('Dealer');
        $player->clearCurrentHand();
        $player->activate();
        $dealer->clearCurrentHand();
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
        $player = $this->players->findByType('Player');
        $dealer = $this->players->findByType('Dealer');
        $playerPoints = $player->getCurrentScore();
        $dealerPoints = $dealer->getCurrentScore();

        if ($playerPoints >= $dealerPoints || $dealerPoints == 21) {
            $dealer->win();
        }
        $player->win();
        $this->reset();
    }
}
