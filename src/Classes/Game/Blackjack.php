<?php

namespace App\Classes\Game;

use App\Classes\Card\Deck;
use App\Classes\Game\PlayerRepository;

class Blackjack
{
    protected $playerRepo;
    protected Deck $deck;
    
    public function __construct()
    {
        $this->playerRepo = new PlayerRepository();
        $this->playerRepo->createPlayer('Player');
        $this->playerRepo->createPlayer('Dealer');
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
        $player = $this->playerRepo->findByType('Player');
        $dealer = $this->playerRepo->findByType('Dealer');
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
        $player = $this->playerRepo->findByType('Player');
        $dealer = $this->playerRepo->findByType('Dealer');
        $playerPoints = $player->getCurrentScore();
        $dealerPoints = $dealer->getCurrentScore();

        if ($playerPoints >= $dealerPoints || $dealerPoints == 21) {
            $dealer->win();
        }
        $player->win();
        $this->reset();
    }
}
