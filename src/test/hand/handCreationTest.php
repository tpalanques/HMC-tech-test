<?php

namespace hand;

use HMC\hand\internal\Dumb;
use HMC\hand\internal\Standard;
use HMC\hand\PLUG\Hand;
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
        $this->assertIsStandard($sut);
    }

    public function testCreateDumbHand() {
        $sut = $this->handService->createDumb();
        $this->assertIsDumb($sut);
    }

    public function testGetStandardHandById() {
        $sut = $this->handService->getById(Standard::TYPE_ID);
        $this->assertIsStandard($sut);
    }

    public function testGetDumbHandById(): void {
        $sut = $this->handService->getById(Dumb::TYPE_ID);
        $this->assertIsDumb($sut);
    }

    private function assertIsStandard(Hand $hand): void {
        $this->assertEquals(3, sizeof($hand->getTricks()));
        $this->assertEquals($this->trickService->getRock()->getValue(), $hand->getTricks()[0]->getValue());
        $this->assertEquals($this->trickService->getPaper()->getValue(), $hand->getTricks()[1]->getValue());
        $this->assertEquals($this->trickService->getScissors()->getValue(), $hand->getTricks()[2]->getValue());
    }

    private function assertIsDumb(Hand $hand): void {
        $this->assertEquals(1, sizeof($hand->getTricks()));
        $this->assertEquals($this->trickService->getRock()->getValue(), $hand->getTricks()[0]->getValue());
    }
}
