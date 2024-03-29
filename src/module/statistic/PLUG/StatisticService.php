<?php

namespace HMC\statistic\PLUG;

use HMC\player\PLUG\Player;
use HMC\statistic\internal\Draw;
use HMC\statistic\internal\Win;

class StatisticService {

    private Draw $draw;
    private Win $win;

    public function __construct() {
        $this->draw = new Draw();
        $this->win = new Win();
    }

    public function getDraws(): int {
        return $this->draw->get();
    }

    public function getWinsByPlayer(Player $player): int {
        return $this->win->getByPlayer($player);
    }

    public function addDraw(): void {
        $this->draw->add();
    }

    public function addWinToPlayer(Player $player): void {
        $this->win->addToPlayer($player);
    }
}
