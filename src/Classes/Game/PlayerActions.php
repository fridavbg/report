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
     * @param $deck
     * @return void
     */
    public function draw(Deck $deck) : void;

    /**
     * Player does not want to draw more cards. A winner is chosen.
     * @return string
     */
    public function stop();
}
