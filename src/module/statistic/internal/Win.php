<?php

namespace HMC\statistic\internal;

use HMC\player\PLUG\Player;

class Win {

    private array $database;

    public function __construct(array $database = null) {
        $this->database = $database ?: [];
    }

    public function getByPlayer(Player $player): int {
        if (array_key_exists($player->getId(), $this->database)) {
            return $this->database[$player->getId()];
        }
        return 0;
    }

    public function addToPlayer(Player $player): void {
        if (array_key_exists($player->getId(), $this->database)) {
            $this->database[$player->getId()]++;
        } else {
            $this->database[$player->getId()] = 1;
        }
    }
}
