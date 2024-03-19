<?php

namespace HMC\statistic\internal;

class Draw {
    const string TABLE_NAME = 'draw';

    private array $database;

    public function __construct(array $database = null) {
        $this->database = $database ?: [];
    }

    public function get(): int {
        return $this->database[self::TABLE_NAME];
    }

    public function add(): void {
        $this->database[self::TABLE_NAME]++;
    }
}
