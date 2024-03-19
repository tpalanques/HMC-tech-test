<?php

namespace HMC\game\internal;

use HMC\game\PLUG\Game as GameInterface;
use HMC\player\PLUG\Player;

class Game implements GameInterface {
    private Player $local;
    private Player $visitor;

    public function __construct(Player $local, Player $visitor) {
        $this->local = $local;
        $this->visitor = $visitor;
    }

    public function getResult(): Player|null {
        $localTrick = $this->local->getHand()->throw();
        $visitorTrick = $this->visitor->getHand()->throw();
        if ($localTrick->beats($visitorTrick)) {
            return $this->local;
        }
        if ($visitorTrick->beats($localTrick)) {
            return $this->visitor;
        }
        return null;
    }
}
