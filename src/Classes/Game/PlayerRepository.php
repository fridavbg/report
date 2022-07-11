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
     * @return object $currentPlayer
     */
    public function findByType(string $type): object
    {
        $currentPlayer = "";
        foreach ($this->players as $player) {
            if ($player->type == $type) {
                $currentPlayer = $player;
            }
        }
        return $currentPlayer;
    }
}
