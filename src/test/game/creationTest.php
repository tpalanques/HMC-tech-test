<?php

namespace game;

use HMC\game\PLUG\GameService;
use HMC\hand\PLUG\Hand;
use HMC\hand\PLUG\HandService;
use HMC\player\PLUG\PlayerService;
use HMC\trick\PLUG\Trick;
use HMC\trick\PLUG\TrickService;
use PHPUnit\Framework\TestCase;

class creationTest extends TestCase {

    const int LOCAL_ID = 645;
    const string LOCAL_NAME = 'John Doe';
    const int VISITOR_ID = 832;
    const string VISITOR_NAME = 'Richard Roe';

    private GameService $gameService;
    private HandService $handService;
    private PlayerService $paperPlayerService;
    private PlayerService $rockPlayerService;
    private PlayerService $scissorsPlayerService;
    private TrickService $trickService;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->gameService = new GameService();
        $this->handService = new HandService();
        $trickService = new TrickService();
        $this->paperPlayerService = new PlayerService($this->getHandServiceMock($trickService->getPaper()));
        $this->rockPlayerService = new PlayerService($this->getHandServiceMock($trickService->getRock()));
        $this->scissorsPlayerService = new PlayerService($this->getHandServiceMock($trickService->getScissors()));
    }

    // DRAW GAMES
    public function testPaperDrawGame(): void {
        $local = $this->paperPlayerService->createDumb(self::LOCAL_ID, self::LOCAL_NAME);
        $visitor = $this->paperPlayerService->createDumb(self::VISITOR_ID, self::VISITOR_NAME);
        $sut = $this->gameService->create($local, $visitor);
        $this->assertNull($sut->getWinner());
    }

    public function testRockDrawGame(): void {
        $local = $this->rockPlayerService->createDumb(self::LOCAL_ID, self::LOCAL_NAME);
        $visitor = $this->rockPlayerService->createDumb(self::VISITOR_ID, self::VISITOR_NAME);
        $sut = $this->gameService->create($local, $visitor);
        $this->assertNull($sut->getWinner());
    }

    public function testScissorsDrawGame(): void {
        $local = $this->scissorsPlayerService->createDumb(self::LOCAL_ID, self::LOCAL_NAME);
        $visitor = $this->scissorsPlayerService->createDumb(self::VISITOR_ID, self::VISITOR_NAME);
        $sut = $this->gameService->create($local, $visitor);
        $this->assertNull($sut->getWinner());
    }

    // PAPER GAMES
    public function testPaperWinsRock() {
        $local = $this->paperPlayerService->createDumb(self::LOCAL_ID, self::LOCAL_NAME);
        $visitor = $this->rockPlayerService->createDumb(self::VISITOR_ID, self::VISITOR_NAME);
        $sut = $this->gameService->create($local, $visitor);
        $this->assertEquals($local, $sut->getWinner());
    }

    public function testPaperDoesNotWinScissors() {
        $local = $this->paperPlayerService->createDumb(self::LOCAL_ID, self::LOCAL_NAME);
        $visitor = $this->scissorsPlayerService->createDumb(self::VISITOR_ID, self::VISITOR_NAME);
        $sut = $this->gameService->create($local, $visitor);
        $this->assertEquals($visitor, $sut->getWinner());
    }

    // ROCK GAMES
    public function testRockDoesNotWinPaper() {
        $local = $this->rockPlayerService->createDumb(self::LOCAL_ID, self::LOCAL_NAME);
        $visitor = $this->paperPlayerService->createDumb(self::VISITOR_ID, self::VISITOR_NAME);
        $sut = $this->gameService->create($local, $visitor);
        $this->assertEquals($visitor, $sut->getWinner());
    }

    public function testRockWinsScissors() {
        $local = $this->rockPlayerService->createDumb(self::LOCAL_ID, self::LOCAL_NAME);
        $visitor = $this->scissorsPlayerService->createDumb(self::VISITOR_ID, self::VISITOR_NAME);
        $sut = $this->gameService->create($local, $visitor);
        $this->assertEquals($local, $sut->getWinner());
    }

    // SCISSORS GAMES
    public function testScissorsWinsPaper() {
        $local = $this->scissorsPlayerService->createDumb(self::LOCAL_ID, self::LOCAL_NAME);
        $visitor = $this->paperPlayerService->createDumb(self::VISITOR_ID, self::VISITOR_NAME);
        $sut = $this->gameService->create($local, $visitor);
        $this->assertEquals($local, $sut->getWinner());
    }

    public function testScissorsDoesNotWinRock() {
        $local = $this->scissorsPlayerService->createDumb(self::LOCAL_ID, self::LOCAL_NAME);
        $visitor = $this->rockPlayerService->createDumb(self::VISITOR_ID, self::VISITOR_NAME);
        $sut = $this->gameService->create($local, $visitor);
        $this->assertEquals($visitor, $sut->getWinner());
    }

    private function getHandServiceMock(Trick $trick): HandService {
        $handService = $this->createMock(HandService::class);
        $handService->method('createWithSingleTrick')
            ->willReturn($this->handService->createWithSingleTrick($trick));
        return $handService;
    }
}
