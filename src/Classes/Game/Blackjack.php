<?php

namespace App\Classes\Game;

use App\Classes\Card\Deck;
use App\Classes\Card\Card;
use App\Classes\Game\PlayerRepository;

class Blackjack
{
    protected PlayerRepository $playerRepo;
    protected Deck $deck;

    public function __construct()
    {
        $this->playerRepo = new PlayerRepository();
        $this->playerRepo->createPlayer('Player');
        $this->playerRepo->createPlayer('Dealer');
        $this->deck = new Deck();
    }

    /**
     * Getter for Deck Object
     * @return Deck
     */
    public function getDeck(): Deck
    {
        return $this->deck;
    }
    /**
     * Getter for active deck
     * @return array<Card>
     */
    public function getCurrentDeck(): array
    {
        return $this->deck->getDeck();
    }

    /**
     * Getter for players
     * @return object
     */
    public function getPlayerRepo(): object
    {
        return $this->playerRepo;
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

        if ($playerPoints < 21 || $dealerPoints < 21) {
            if ($playerPoints > $dealerPoints) {
                $player->win();
            }
            $dealer->win();
        } elseif ($dealerPoints === 21) {
            $dealer->win();
        } elseif ($playerPoints == 21) {
            $player->win();
        } elseif ($playerPoints >= $dealerPoints) {
            $dealer->win();
        } elseif ($dealerPoints > $playerPoints) {
            $player->win();
        }
        $this->reset();
    }
}
