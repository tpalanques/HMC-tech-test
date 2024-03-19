<?php

namespace HMC\game\PLUG;

use HMC\player\PLUG\Player;

interface Game {
    public function getWinner(): Player|null;
}
