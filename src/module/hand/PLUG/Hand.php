<?php

namespace HMC\hand\PLUG;

use HMC\trick\PLUG\Trick;

interface Hand {
    public function getTypeId(): int;
    public function getTypeName(): string;
    public function getTricks(): array;
    public function throw(): Trick;
}
