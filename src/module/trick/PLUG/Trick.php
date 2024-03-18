<?php

namespace HMC\trick\PLUG;

interface Trick {
    public function getValue(): string;
    public function beats(Trick $trick): bool;
}
