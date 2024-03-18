<?php

namespace HMC\trick\internal;

class Paper extends Base {
    const string TYPE_NAME = 'paper';

    public function __construct() {
        parent::__construct(self::TYPE_NAME);
    }
}
