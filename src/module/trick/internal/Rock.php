<?php

namespace HMC\trick\internal;

use HMC\trick\PLUG\Trick;
use ReflectionClass;

class Rock extends Base {
    const string TYPE_NAME = 'rock';

    public function __construct() {
        parent::__construct(self::TYPE_NAME);
    }
}
