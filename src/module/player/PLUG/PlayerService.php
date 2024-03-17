<?php

namespace HMC\player\PLUG;

use HMC\player\internal\DefaultPlayer;
use HMC\player\internal\Saver;
use HMC\hand\PLUG\HandService;

class PlayerService {
    private HandService $handService;
    private Saver $playerSaver;

    public function __construct(HandService $handService = null, Saver $playerSaver = null) {
        $this->handService = $handService ? $handService : new HandService();
        $this->playerSaver = $playerSaver ? $playerSaver : new Saver();
    }

    public function createDefault(int $id, string $name): DefaultPlayer {
        $player = new DefaultPlayer($id, $name, $this->handService->createStandard());
        $this->playerSaver->save($player);
        return $player;
    }

    public function createDumb(int $id, string $name): DefaultPlayer {
        $player = new DefaultPlayer($id, $name, $this->handService->createDumb());
        $this->playerSaver->save($player);
        return $player;
    }

    public function getById(int $id): Player {
        return $this->playerSaver->get($id);
    }
}
