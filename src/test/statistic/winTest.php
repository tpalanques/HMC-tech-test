<?php

namespace statistic;

use HMC\player\PLUG\Player;
use HMC\player\PLUG\PlayerService;
use HMC\statistic\internal\Win;
use PHPUnit\Framework\TestCase;

class winTest extends TestCase {

    const int PLAYER_INITIAL_WINS = 1235;
    const int PLAYER_ID = 766;
    const string PLAYER_NAME = 'JohnDoe';
    private PlayerService $playerService;
    private Win $sut;

    protected function setUp(): void {
        parent::setUp();
        $this->playerService = new PlayerService();
        $this->sut = new Win($this->getWinDatabaseMock());
    }

    public function testGetByExistingPlayer() {
        $player = $this->playerService->createDumb(self::PLAYER_ID, self::PLAYER_NAME);
        $this->assertEquals(self::PLAYER_INITIAL_WINS, $this->sut->getByPlayer($player));
    }

    public function testGetByUnexistentPlayer() {
        $playerMock = $this->createMock(Player::class);
        $playerMock->method('getId')->willReturn(9999);
        $this->assertEquals(0, $this->sut->getByPlayer($playerMock));
    }

    public function testAddToPlayer() {
        $player = $this->playerService->createDumb(self::PLAYER_ID, self::PLAYER_NAME);
        $this->sut->addToPlayer($player);
        $this->assertEquals(self::PLAYER_INITIAL_WINS + 1, $this->sut->getByPlayer($player));
    }

    private function getWinDatabaseMock(): array {
        $database[Win::TABLE_NAME][self::PLAYER_ID] = self::PLAYER_INITIAL_WINS;
        return $database;
    }
}
