<?php

namespace App\Classes\Game;

use App\Classes\Game\Player;

class PlayerRepository
{

    private $players = array();

    public function createPlayer($type)
    {
        $this->players[] = new Player($type);
    }

    public function findByType($type)
    {
        foreach ($this->players as $player) {
            if ($player->type == $type) {
                return $player;
            }
        }
    }
}
