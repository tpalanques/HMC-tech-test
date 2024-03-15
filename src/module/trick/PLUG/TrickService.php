<?php

namespace HMC\trick\PLUG;

use HMC\trick\internal\Rock;
use HMC\trick\internal\Paper;
use HMC\trick\internal\Scissors;

class TrickService {

    public function getRock(): Trick {
        return new Rock();
    }

    public function getPaper(): Trick {
        return new Paper();
    }

    public function getScissors(): Trick {
        return new Scissors();
    }
}
