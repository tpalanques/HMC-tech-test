<?php

namespace HMC\game\internal;

use HMC\game\PLUG\Game as GameInterface;
use HMC\player\PLUG\Player;
use HMC\statistic\PLUG\StatisticService;

class Game implements GameInterface {
    private Player $local;
    private Player $visitor;
    private Player|null $winner;

    public function __construct(Player $local, Player $visitor, StatisticService $statisticService = null) {
        $this->local = $local;
        $this->visitor = $visitor;
        $this->winner = $this->play($this->local, $this->visitor, $statisticService ?: new StatisticService());
    }

    public function getWinner(): Player|null {
        return $this->winner;
    }

    private function play(Player $local, Player $visitor, StatisticService $statisticService): Player|null {
        $localTrick = $local->getHand()->throw();
        $visitorTrick = $visitor->getHand()->throw();
        if ($localTrick->beats($visitorTrick)) {
            $statisticService->addWinToPlayer($local);
            return $local;
        } else if ($visitorTrick->beats($localTrick)) {
            $statisticService->addWinToPlayer($visitor);
            return $visitor;
        } else {
            $statisticService->addDraw();
            return null;
        }
    }
}
