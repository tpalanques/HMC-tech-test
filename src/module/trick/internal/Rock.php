<?php

namespace HMC\trick\internal;

use HMC\trick\PLUG\Trick;
use ReflectionClass;

class Rock implements Trick {
    public function getValue(): string {
        return strtolower((new ReflectionClass($this))->getShortName());
    }
}
