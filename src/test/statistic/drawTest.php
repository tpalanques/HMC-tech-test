<?php

namespace statistic;

use HMC\statistic\internal\Draw;
use PHPUnit\Framework\TestCase;

class drawTest extends TestCase {

    const int INITIAL_DRAWS = 4;
    private Draw $sut;

    protected function setUp(): void {
        parent::setUp();
        $this->sut = new Draw($this->getDrawDatabaseMock(self::INITIAL_DRAWS));
    }

    public function testGet() {
        $this->assertEquals(self::INITIAL_DRAWS, $this->sut->get());
    }

    public function testSave() {
        $this->sut->add();
        $this->assertEquals(self::INITIAL_DRAWS + 1, $this->sut->get());
    }

    private function getDrawDatabaseMock(int $draws): array {
        return [Draw::TABLE_NAME => $draws];
    }
}
