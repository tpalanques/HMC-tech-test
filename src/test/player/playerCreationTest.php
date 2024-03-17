<?php

namespace player;

use HMC\hand\internal\Dumb;
use HMC\hand\internal\Standard;
use HMC\player\PLUG\PlayerService;
use HMC\hand\PLUG\HandService;
use PHPUnit\Framework\TestCase;

class playerCreationTest extends TestCase {
    const int USER_ID = 234;
    const string USER_NAME = 'John Doe';

    private PlayerService $playerService;
    private HandService $handService;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->playerService = new PlayerService();
        $this->handService = new HandService();
    }

    /**
     * @throws \Exception
     */
    public function testCreateDefaultPlayer(): void {
        $sut = $this->playerService->createDefault(self::USER_ID, self::USER_NAME);
        $this->assertEquals(self::USER_ID, $sut->getId());
        $this->assertEquals(self::USER_NAME, $sut->getName());
        $this->assertEquals('default', $sut->getType());
        $this->assertEquals(
            $this->handService->getById(Standard::TYPE_ID)->getTypeId(),
            $sut->getHand()->getTypeId()
        );
    }

    public function testCreateDumbPlayer(): void {
        $sut = $this->playerService->createDumb(self::USER_ID, self::USER_NAME);
        $this->assertEquals(self::USER_ID, $sut->getId());
        $this->assertEquals(self::USER_NAME, $sut->getName());
        $this->assertEquals('default', $sut->getType());
        $this->assertEquals(
            $this->handService->getById(Dumb::TYPE_ID)->getTypeId(),
            $sut->getHand()->getTypeId()
        );
    }

    public function testPlayerIsSaved() {
        $sut = $this->playerService->createDefault(self::USER_ID, self::USER_NAME);
        $player = $this->playerService->getById($sut->getId());
        $this->assertEquals(self::USER_ID, $player->getId());
        $this->assertEquals(self::USER_NAME, $player->getName());
        $this->assertEquals('default', $player->getType());
    }
}
