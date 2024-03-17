<?php

namespace HMC\hand\internal;

use HMC\trick\PLUG\TrickService;

class Standard extends Base {

    const string TYPE_NAME = 'standard';
    const int TYPE_ID = 1;

    private TrickService $trickService;

    public function __construct() {
        parent::__construct(self::TYPE_ID, self::TYPE_NAME);
        $this->addTrick($this->getTrickService()->getRock());
        $this->addTrick($this->getTrickService()->getPaper());
        $this->addTrick($this->getTrickService()->getScissors());
    }
}
