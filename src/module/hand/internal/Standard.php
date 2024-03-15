<?php

namespace HMC\hand\internal;

use HMC\hand\PLUG\Hand;
use HMC\trick\PLUG\TrickService;

class Standard implements Hand {

    private array $hand;
    private TrickService $trickService;

    public function __construct() {
        $this->trickService = new TrickService();
        $this->hand[] = $this->trickService->getRock();
        $this->hand[] = $this->trickService->getPaper();
        $this->hand[] = $this->trickService->getScissors();
    }

    public function getTricks(): array {
        return $this->hand;
    }
}
