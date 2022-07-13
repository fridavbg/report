<?php

namespace App\Classes\Game;

use App\Classes\Card\Deck;

/**
 * Player functionality
 */

interface PlayerActions
{
    /**
     * Player draws one card from the top of the deck
     * @param Deck $deck
     * @return void
     */
    public function draw(Deck $deck): void;

    /**
     * Player does not want to draw more cards. 
     * @return void
     */
    public function stop();

    /**
     * Reset current cardHand and score
     * to start a new round
     * @return void
     */
    public function clearCurrentHand();

    /**
     * Activate player
     * @return void
     */
    public function activate();
    /**
     * Increment the player's or the dealer's total
     * score by one, depending who is closest to 21
     * @return void
     */
    public function win();
}
