<?php

namespace test;

use HMC\trick\PLUG\TrickService;
use PHPUnit\Framework\TestCase;

class trickComparisionTest extends TestCase {
    private TrickService $trickService;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->trickService = new TrickService();
    }

    public function testPaperDoesntBeatPaper(): void {
        $sut = $this->trickService->getPaper();
        $paper = $this->trickService->getPaper();
        $this->assertFalse($this->trickService->beats($sut,$paper));
    }

    public function testPaperBeatsRock(): void {
        $sut = $this->trickService->getPaper();
        $rock = $this->trickService->getRock();
        $this->assertTrue($this->trickService->beats($sut,$rock));
    }

    public function testPaperDoesntBeatScissors(): void {
        $sut = $this->trickService->getPaper();
        $scissors = $this->trickService->getScissors();
        $this->assertFalse($this->trickService->beats($sut,$scissors));
    }

    public function testRockDoesntBeatPaper(): void {
        $sut = $this->trickService->getRock();
        $paper = $this->trickService->getPaper();
        $this->assertFalse($this->trickService->beats($sut,$paper));
    }

    public function testRockDoesntBeatRock(): void {
        $sut = $this->trickService->getRock();
        $rock = $this->trickService->getRock();
        $this->assertFalse($this->trickService->beats($sut,$rock));
    }

    public function testRockBeatsScissors(): void {
        $sut = $this->trickService->getRock();
        $scissors = $this->trickService->getScissors();
        $this->assertTrue($this->trickService->beats($sut,$scissors));
    }

    public function testScissorsBeatsPaper(): void {
        $sut = $this->trickService->getScissors();
        $paper = $this->trickService->getPaper();
        $this->assertTrue($this->trickService->beats($sut,$paper));
    }

    public function testScissorsDoesntBeatRock(): void {
        $sut = $this->trickService->getScissors();
        $rock = $this->trickService->getRock();
        $this->assertFalse($this->trickService->beats($sut,$rock));
    }

    public function testScissorsBeatsScissors(): void {
        $sut = $this->trickService->getScissors();
        $scissors = $this->trickService->getScissors();
        $this->assertFalse($this->trickService->beats($sut,$scissors));
    }
}
