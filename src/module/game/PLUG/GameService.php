<?php

namespace HMC\game\PLUG;

use HMC\player\PLUG\Player;
use HMC\game\internal\Game;
use HMC\game\PLUG\Game as GameInterface;

class GameService {
    public function create(Player $local, Player $visitor): GameInterface {
        return new Game($local, $visitor);
    }
}
