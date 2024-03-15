<?php

namespace HMC\player\internal;

use HMC\player\PLUG\Player;

class Saver {
    const string TABLE_NAME = 'player';
    private array $database;
    
    public function __construct(array $database = null) {
        $this->database = $database ? $database : [];
    }

    public function get(int $id): Player {
        $info = $this->database[self::TABLE_NAME][$id];
        switch ($info['type']) {
            case DefaultPlayer::TYPE_NAME:
                return new DefaultPlayer($info['id'], $info['name']);
        }
    }

    public function save(Player $player): void {
        $this->database[self::TABLE_NAME][$player->getId()] = $this->encode($player);
    }

    private function encode(Player $player): array {
        return [
            'id' => $player->getId(),
            'name' => $player->getName(),
            'type' => $player->getType(),
        ];
    }
}
