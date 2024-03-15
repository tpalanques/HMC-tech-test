<?php

namespace HMC\player\PLUG;

use HMC\player\internal\DefaultPlayer;
use HMC\player\internal\Saver;

class PlayerService {
    private Saver $playerSaver;

    public function __construct(Saver $playerSaver = null) {
        $this->playerSaver = $playerSaver ? $playerSaver : new Saver();
    }

    public function createDefault(int $id, string $name): DefaultPlayer {
        $player = new DefaultPlayer($id, $name);
        $this->playerSaver->save($player);
        return $player;
    }

    public function getById(int $id): Player {
        return $this->playerSaver->get($id);
    }
}
