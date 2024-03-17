<?php

namespace HMC\player\internal;

use HMC\hand\PLUG\Hand;
use HMC\player\PLUG\Player;

// FIXME rename to default? Or maybe move to model?
class DefaultPlayer implements Player {
    const string TYPE_NAME = 'default';

    private int $id;
    private string $name;
    private Hand $hand;

    public function __construct($id, $name, $hand) {
        $this->id = $id;
        $this->name = $name;
        $this->hand = $hand;
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

    public function getHand(): Hand {
        return $this->hand;
    }
}
