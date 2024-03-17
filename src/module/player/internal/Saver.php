<?php

namespace HMC\player\internal;

use HMC\player\PLUG\Player;
use HMC\hand\PLUG\HandService;

class Saver {
    const string TABLE_NAME = 'player';
    private array $database;
    private HandService $handService;

    public function __construct(array $database = null, HandService $handService = null) {
        $this->database = $database ? $database : [];
        $this->handService = $handService ? $handService : new HandService();
    }

    public function get(int $id): Player {
        $info = $this->database[self::TABLE_NAME][$id];
        return new DefaultPlayer(
            $info['id'],
            $info['name'],
            $this->handService->getById($info['handTypeId'])
        );
    }

    public function save(Player $player): void {
        $this->database[self::TABLE_NAME][$player->getId()] = $this->encode($player);
    }

    private function encode(Player $player): array {
        return [
            'id' => $player->getId(),
            'name' => $player->getName(),
            'type' => $player->getType(),
            'handTypeId' => $player->getHand()->getTypeId()
        ];
    }
}
