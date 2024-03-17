<?php

namespace HMC\player\PLUG;

use HMC\hand\PLUG\Hand;

interface Player {
    public function getName(): string;
    public function getId(): int;
    public function getType(): string;
    public function getHand(): Hand;
}
