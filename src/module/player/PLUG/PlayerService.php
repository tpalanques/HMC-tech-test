<?php

namespace HMC\player\PLUG;

use HMC\player\internal\DefaultPlayer;
use HMC\player\internal\Saver;
use HMC\hand\PLUG\HandService;
use HMC\trick\PLUG\Trick;

class PlayerService {
    private HandService $handService;
    private Saver $playerSaver;

    public function __construct(HandService $handService = null, Saver $playerSaver = null) {
        $this->handService = $handService ?: new HandService();
        $this->playerSaver = $playerSaver ?: new Saver();
    }

    public function createDefault(int $id, string $name): DefaultPlayer {
        $player = new DefaultPlayer($id, $name, $this->handService->createStandard());
        $this->playerSaver->save($player);
        return $player;
    }

    public function createDumb(int $id, string $name): DefaultPlayer {
        $player = new DefaultPlayer($id, $name, $this->handService->createWithSingleTrick());
        $this->playerSaver->save($player);
        return $player;
    }

    public function getById(int $id): Player {
        return $this->playerSaver->get($id);
    }
}
