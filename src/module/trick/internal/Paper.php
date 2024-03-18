<?php

namespace HMC\trick\internal;

use HMC\trick\PLUG\Trick;
use ReflectionClass;

class Paper extends Base {
    const string TYPE_NAME = 'paper';

    public function __construct() {
        parent::__construct(self::TYPE_NAME);
    }
}
