<?php

namespace statistic;

use HMC\statistic\internal\Draw;
use PHPUnit\Framework\TestCase;

class drawTest extends TestCase {

    private Draw $draw;

    public function testGet() {
        $draws = 4;
        $sut = new Draw($this->getDrawDatabaseMock($draws));
        $this->assertEquals($draws, $sut->get());
    }

    public function testSave() {
        $initialDraws = 7;
        $sut = new Draw($this->getDrawDatabaseMock($initialDraws));
        $sut->add();
        $this->assertEquals($initialDraws + 1, $sut->get());
    }

    private function getDrawDatabaseMock(int $draws): array {
        return [Draw::TABLE_NAME => $draws];
    }
}
