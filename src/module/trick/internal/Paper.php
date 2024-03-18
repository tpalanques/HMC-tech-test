<?php

namespace HMC\trick\internal;

use HMC\trick\PLUG\Trick;

class Paper extends Base {
    const string TYPE_NAME = 'paper';

    public function __construct() {
        parent::__construct(self::TYPE_NAME);
    }

    public function beats(Trick $trick): bool {
        return $trick->getValue() === Rock::TYPE_NAME;
    }
}
