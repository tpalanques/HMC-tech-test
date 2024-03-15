<?php

namespace HMC\hand\internal;

use HMC\hand\PLUG\Hand;
use HMC\trick\PLUG\TrickService;

class Dumb implements Hand {

    private array $hand;
    private TrickService $trickService;

    public function __construct() {
        $this->trickService = new TrickService();
        $this->hand[] = $this->trickService->getRock();
    }

    public function getTricks(): array {
        return $this->hand;
    }
}
