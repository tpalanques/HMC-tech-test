<?php

namespace HMC\hand\internal;

use HMC\hand\PLUG\Hand;
use HMC\trick\PLUG\Trick;
use HMC\trick\PLUG\TrickService;

abstract class Base implements Hand {

    private int $typeId;
    private string $typeName;
    private array $hand;
    private TrickService $trickService;

    public function __construct(int $typeId, string $typeName, TrickService $trickService = null) {
        $this->typeId = $typeId;
        $this->typeName = $typeName;
        $this->trickService = $trickService ? $trickService : new TrickService();
        $this->hand = [];
    }

    public function getTypeId(): int {
        return $this->typeId;
    }

    public function getTypeName(): string {
        return $this->typeName;
    }

    public function getTricks(): array {
        return $this->hand;
    }

    protected function getTrickService(): TrickService {
        return $this->trickService;
    }

    protected function addTrick(Trick $trick): void {
        $this->hand[] = $trick;
    }
}
