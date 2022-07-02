<?php

namespace App\Classes\Game;

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
    public function draw($deck);

    /**
     * Player does not want to draw more cards. A winner is chosen.
     * @return string
     */
    public function stop();
}
