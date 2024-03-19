<?php

namespace HMC\statistic\internal;

class Draw {

    private int $database;

    public function __construct(int $database = null) {
        $this->database = $database ?: 0;
    }

    public function get(): int {
        return $this->database;
    }

    public function add(): void {
        $this->database++;
    }
}
