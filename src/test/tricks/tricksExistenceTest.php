<?php

namespace test;

use HMC\trick\PLUG\TrickService;
use PHPUnit\Framework\TestCase;

class tricksExistenceTest extends TestCase {
    private TrickService $trickService;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->trickService = new TrickService();
    }

    public function testPaperExists(): void {
        $sut = $this->trickService->getPaper();
        $this->assertEquals('paper', $sut->getValue(), 'paper trick exists');
    }

    public function testRockExists(): void {
        $sut = $this->trickService->getRock();
        $this->assertEquals('rock', $sut->getValue(), 'rock trick exists');
    }

    public function testScissorsExists(): void {
        $sut = $this->trickService->getScissors();
        $this->assertEquals('scissors', $sut->getValue(), 'scissors trick exists');
    }
}
