<?php

namespace HMC\game\PLUG;

use HMC\player\PLUG\Player;

interface Game {
    public function getResult(): Player|null;
}
