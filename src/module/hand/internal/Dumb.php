<?php

namespace HMC\hand\internal;

use HMC\hand\PLUG\Hand;
use HMC\trick\PLUG\TrickService;

class Dumb extends Base {

    const string TYPE_NAME = 'dumb';
    const int TYPE_ID = 2;

    public function __construct() {
        parent::__construct(self::TYPE_ID, self::TYPE_NAME);
        $this->addTrick($this->getTrickService()->getRock());
    }
}
