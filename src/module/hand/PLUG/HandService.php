<?php

namespace HMC\hand\PLUG;

use HMC\hand\internal\Dumb;
use HMC\hand\internal\Standard;
use Exception;

class HandService {

    public function createStandard(): Hand {
        return new Standard();
    }

    public function createDumb(): Hand {
        return new Dumb();
    }

    /**
     * @throws Exception
     */
    public function getById(int $id): Hand {
        switch ($id) {
            case Standard::TYPE_ID:
                return $this->createStandard();
            case Dumb::TYPE_ID:
                return $this->createDumb();
            default:
                // FIXME - add custom exception
                throw new Exception();
        }
    }
}
