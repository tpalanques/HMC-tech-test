<?php

namespace HMC\statistic\internal;

use HMC\player\PLUG\Player;
use Exception;

class Win {
    const string TABLE_NAME = 'win';

    private array $database;

    public function __construct(array $database = null) {
        $this->database = $database ?: [self::TABLE_NAME];
    }

    public function getByPlayer(Player $player): int {
        if (array_key_exists($player->getId(), $this->database[self::TABLE_NAME])) {
            return $this->database[self::TABLE_NAME][$player->getId()];
        }
        return 0;
    }

    public function addToPlayer(Player $player): void {
        if (array_key_exists($player->getId(), $this->database[self::TABLE_NAME])) {
            $this->database[self::TABLE_NAME][$player->getId()]++;
        } else {
            $this->database[self::TABLE_NAME][$player->getId()] == 1;
        }
    }
}
