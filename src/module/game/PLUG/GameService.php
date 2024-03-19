<?php

namespace HMC\game\PLUG;

use HMC\player\PLUG\Player;
use HMC\game\internal\Game;
use HMC\game\PLUG\Game as GameInterface;
use HMC\statistic\PLUG\StatisticService;

class GameService {
    private StatisticService $statisticService;

    public function __construct(StatisticService $statisticService = null) {
        $this->statisticService = $statisticService ?: new StatisticService();
    }

    public function create(Player $local, Player $visitor): GameInterface {
        return new Game($local, $visitor, $this->statisticService);
    }
}
