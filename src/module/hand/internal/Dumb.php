<?php

namespace HMC\hand\internal;

use HMC\trick\PLUG\Trick;

class Dumb extends Base {

    const string TYPE_NAME = 'dumb';
    const int TYPE_ID = 2;

    public function __construct(Trick $trick) {
        parent::__construct(self::TYPE_ID, self::TYPE_NAME);
        $this->addTrick($trick);
    }
}
