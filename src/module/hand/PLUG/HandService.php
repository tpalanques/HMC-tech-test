<?php

namespace HMC\hand\PLUG;

use HMC\hand\internal\Dumb;
use HMC\hand\internal\Standard;
use Exception;
use HMC\trick\internal\Rock;
use HMC\trick\PLUG\Trick;

class HandService {

    public function createStandard(): Hand {
        return new Standard();
    }

    public function createWithSingleTrick(Trick $trick = null): Hand {
        return new Dumb($trick ?: new Rock());
    }

    /**
     * @throws Exception
     */
    public function getById(int $id): Hand {
        switch ($id) {
            case Standard::TYPE_ID:
                return $this->createStandard();
            case Dumb::TYPE_ID:
                return $this->createWithSingleTrick();
            default:
                // FIXME - add custom exception
                throw new Exception();
        }
    }
}
