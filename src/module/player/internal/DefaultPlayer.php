<?php

namespace HMC\player\internal;

use HMC\player\PLUG\Player;

class DefaultPlayer implements Player {
    const string TYPE_NAME = 'default';

    private int $id;
    private string $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getType(): string {
        return self::TYPE_NAME;
    }
}
