<?php

namespace hand;

use HMC\hand\PLUG\HandService;
use HMC\trick\internal\Paper;
use HMC\trick\internal\Rock;
use HMC\trick\internal\Scissors;
use PHPUnit\Framework\TestCase;

class throwTest extends TestCase {
    private HandService $handService;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->handService = new HandService();
    }

    public function testThrowStandardHand(): void {
        $sut = $this->handService->createStandard();
        $trick = $sut->throw();
        $this->assertTrue(in_array(
            $trick->getValue(),
            [
                Paper::TYPE_NAME,
                Rock::TYPE_NAME,
                Scissors::TYPE_NAME,
            ]
        ));
    }

    public function testThrowDumbHand() {
        $sut = $this->handService->createDumb();
        $trick = $sut->throw();
        $this->assertEquals(
            Rock::TYPE_NAME,
            $trick->getValue()
        );
    }

    public function testRandomness() {
        $sut = $this->handService->createStandard();
        $tries = 100;
        $statistics = [
            Paper::TYPE_NAME => 0,
            Rock::TYPE_NAME => 0,
            Scissors::TYPE_NAME => 0,
        ];
        for ($i = 1; $i <= $tries; $i++) {
            $statistics[$sut->throw()->getValue()]++;
        }
        $this->assertFalse($statistics[Paper::TYPE_NAME] === 0,'Paper was never thrown in '.$tries.' tries');
        $this->assertFalse($statistics[Rock::TYPE_NAME] === 0, 'Rock was never thrown in '.$tries.' tries');
        $this->assertFalse($statistics[Scissors::TYPE_NAME] === 0, 'Scissors was never thrown in '.$tries.' tries');
    }
}
