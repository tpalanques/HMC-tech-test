<?php

namespace hand;

use HMC\hand\PLUG\HandService;
use HMC\trick\PLUG\TrickService;
use PHPUnit\Framework\TestCase;

class handCreationTest extends TestCase {
    private HandService $handService;
    private TrickService $trickService;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->handService = new HandService();
        $this->trickService = new TrickService();
    }

    public function testCreateStandardHand(): void {
        $sut = $this->handService->createStandard();
        $this->assertEquals(3, sizeof($sut->getTricks()));
        $this->assertEquals($this->trickService->getRock()->getValue(), $sut->getTricks()[0]->getValue());
        $this->assertEquals($this->trickService->getPaper()->getValue(), $sut->getTricks()[1]->getValue());
        $this->assertEquals($this->trickService->getScissors()->getValue(), $sut->getTricks()[2]->getValue());
    }

    public function testCreateDumbHand() {
        $sut = $this->handService->createDumb();
        $this->assertEquals(1, sizeof($sut->getTricks()));
        $this->assertEquals($this->trickService->getRock()->getValue(), $sut->getTricks()[0]->getValue());
    }
}
