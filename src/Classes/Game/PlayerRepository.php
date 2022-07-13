<?php

namespace App\Classes\Game;

use App\Classes\Game\Player;

class PlayerRepository
{
    /**
     * @var array<Player> $players
     */

    protected array $players = array();

    /**
     * Create an instance of the Player class
     * @param string $type
     */
    public function createPlayer($type): void
    {
        $this->players[] = new Player($type);
    }

    /**
     * @param string $type
     * @return Player $currentPlayer
     */
    public function findByType(string $type)
    {
        $activePlayer = new Player();
        foreach ($this->players as $player) {
            if ($player->type == $type) {
                $activePlayer = $player;
            }
        }
        return $activePlayer;
    }
}
