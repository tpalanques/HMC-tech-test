<?php

namespace HMC\trick\internal;

class Scissors extends Base {

    const string TYPE_NAME = 'scissors';

    public function __construct() {
        parent::__construct(self::TYPE_NAME);
    }
}
