<?php

namespace App\Classes\Game;

use App\Classes\Game\Player;

class PlayerRepository
{
    /**
     * @var array<Player> $players
     */

    protected array $players = array();

    public function createPlayer($type)
    {
        $this->players[] = new Player($type);
    }

    /**
     * @param string $type
     * @return Player
     */
    public function findByType(string $type) : Player
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
