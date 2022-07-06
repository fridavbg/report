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

    public function __construct(string $type = 'Player')
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
     * Calculate points of currentCardHand
     * @param array $card
     */
    public function calculateCardHand()
    {
        $cardHand = $this->getCurrentCardHand();
        $points = 0;
        for ($i = 0; $i < count($cardHand); $i++) {
            $cardValue = $cardHand[$i]->getValue();
            if (in_array($cardValue, ['A', 'J', 'Q', 'K'])) {
                $points += 11;
            } else {
                $points += $cardValue;
            }
        }
        $this->setCurrentScore($points);
    }

    /**
     * Getter for player type
     * @access public
     * @return string $type Player or dealer
     */
    public function getPlayer()
    {
        return $this->type;
    }

    /**
     * Set player type
     * @access public
     */
    public function setPlayer($type)
    {
        $this->type = $type;
    }

    /**
     * Check for player type
     * @access public
     * @return string $type Player or dealer
     */
    public function getCurrentScore()
    {
        return $this->currentScore;
    }

    /**
     * Set player type
     * @access public
     */
    public function setCurrentScore($score)
    {
        $this->currentScore = $score;
    }

    /**
     * Player draws one card from current Deck.
     * @return void
     */
    public function draw($deck)
    {
        $newCardHand = array();
        $currentCardHand = $this->getCurrentCardHand();
        $drawnCard = $deck->getCardForPlayer(1);
        array_push($newCardHand, $drawnCard);
        $updatedCardHand = array_merge($newCardHand, $currentCardHand);
        $this->setCurrentCardHand($updatedCardHand);
    }

    /**
     * Switch from player to dealer
     * @access public
     * @return void
     */
    public function stop()
    {
        if($this->type === 'Player'){
            dd('Dealers turn');
            $this->setPlayer('Dealer');
        } elseif($this->type === 'Dealer'){
            dd('Who won?');
        };
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
}
