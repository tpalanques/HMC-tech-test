<?php

namespace HMC\game\internal;

use HMC\game\PLUG\Game as GameInterface;
use HMC\player\PLUG\Player;
use HMC\statistic\PLUG\StatisticService;

class Game implements GameInterface {
    private Player $local;
    private Player $visitor;
    private Player|null $winner;
    private StatisticService $statisticService;

    public function __construct(Player $local, Player $visitor , StatisticService $statisticService = null) {
        $this->local = $local;
        $this->visitor = $visitor;
        $this->winner = $this->play($this->local, $this->visitor);
        $this->statisticService = $statisticService ?: new StatisticService;
    }

    public function getWinner(): Player|null {
        return $this->winner;
    }

    private function play(Player $local, Player $visitor): Player|null {
        $localTrick = $local->getHand()->throw();
        $visitorTrick = $visitor->getHand()->throw();
        if ($localTrick->beats($visitorTrick)) {
            return $local;
        }
        if ($visitorTrick->beats($localTrick)) {
            return $visitor;
        }
        return null;
    }
}
