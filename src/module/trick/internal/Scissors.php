<?php

namespace HMC\trick\internal;

use HMC\trick\PLUG\Trick;
use ReflectionClass;

class Scissors implements Trick {
    public function getValue(): string {
        return strtolower((new ReflectionClass($this))->getShortName());
    }
}
