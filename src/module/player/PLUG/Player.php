<?php

namespace HMC\player\PLUG;

interface Player {
    public function getName(): string;
    public function getId(): int;
    public function getType(): string;
}
