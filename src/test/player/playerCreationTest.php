<?php

namespace player;

use HMC\player\PLUG\PlayerService;
use PHPUnit\Framework\TestCase;

class playerCreationTest extends TestCase {
    const int USER_ID = 234;
    const string USER_NAME = 'John Doe';

    private PlayerService $playerService;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->playerService = new PlayerService();
    }

    public function testPlayerHasNameAndId(): void {
        $sut = $this->playerService->createDefault(self::USER_ID, self::USER_NAME);
        $this->assertEquals(self::USER_ID, $sut->getId());
        $this->assertEquals(self::USER_NAME, $sut->getName());
        $this->assertEquals('default', $sut->getType());
    }

    public function testPlayerIsSaved() {
        $sut = $this->playerService->createDefault(self::USER_ID, self::USER_NAME);
        $player = $this->playerService->getById($sut->getId());
        $this->assertEquals(self::USER_ID, $player->getId());
        $this->assertEquals(self::USER_NAME, $player->getName());
        $this->assertEquals('default', $player->getType());
    }
}
