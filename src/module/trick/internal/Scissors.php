<?php

namespace HMC\trick\internal;

use HMC\trick\PLUG\Trick;

class Scissors extends Base {

    const string TYPE_NAME = 'scissors';

    public function __construct() {
        parent::__construct(self::TYPE_NAME);
    }

    public function beats(Trick $trick): bool {
        return $trick->getValue() === Paper::TYPE_NAME;
    }
}
