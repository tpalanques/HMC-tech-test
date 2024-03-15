<?php

namespace HMC\hand\PLUG;

use HMC\hand\internal\Dumb;
use HMC\hand\internal\Standard;
use HMC\player\internal\Saver;

class HandService {
    private Saver $playerSaver;

    public function createStandard(): Hand {
        return new Standard();
    }

    public function createDumb(): Hand {
        return new Dumb();
    }
}
