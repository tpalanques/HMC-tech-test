<?php

namespace HMC\trick\internal;

use HMC\trick\PLUG\Trick;

class Rock extends Base {
    const string TYPE_NAME = 'rock';

    public function __construct() {
        parent::__construct(self::TYPE_NAME);
    }

    public function beats(Trick $trick): bool {
        return $trick->getValue() === Scissors::TYPE_NAME;
    }
}
