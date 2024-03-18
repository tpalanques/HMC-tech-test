<?php

namespace HMC\trick\internal;

use HMC\trick\PLUG\Trick;

abstract class Base implements Trick {
    private string $typeName;

    protected function __construct($typeName) {
        $this->typeName = $typeName;
    }

    public function getValue(): string {
        return $this->typeName;
    }
}
