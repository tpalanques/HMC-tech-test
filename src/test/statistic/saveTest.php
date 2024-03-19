<?php

namespace statistic;

use HMC\game\PLUG\GameService;
use HMC\hand\PLUG\HandService;
use HMC\player\PLUG\PlayerService;
use HMC\statistic\PLUG\StatisticService;
use HMC\trick\PLUG\Trick;
use HMC\trick\PLUG\TrickService;
use PHPUnit\Framework\TestCase;

class saveTest extends TestCase {

    const int LOCAL_PLAYER_ID = 984;
    const string LOCAL_PLAYER_NAME = 'John Doe';
    const int VISITOR_PLAYER_ID = 164;
    const string VISITOR_PLAYER_NAME = 'Richard Roe';

    private HandService $handService;
    private GameService $gameService;
    private StatisticService $sut;
    private PlayerService $paperPlayerService;
    private PlayerService $rockPlayerService;
    private PlayerService $scissorsPlayerService;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->handService = new HandService();
        $trickService = new TrickService();
        $this->paperPlayerService = new PlayerService($this->getHandServiceMock($trickService->getPaper()));
        $this->rockPlayerService = new PlayerService($this->getHandServiceMock($trickService->getRock()));
        $this->scissorsPlayerService = new PlayerService($this->getHandServiceMock($trickService->getScissors()));
    }

    protected function setUp(): void {
        parent::setUp();
        $this->sut = new StatisticService();
        $this->gameService = new GameService($this->sut);
    }

    public function testDrawSave() {
        $local = $this->paperPlayerService->createDumb(self::LOCAL_PLAYER_ID, self::LOCAL_PLAYER_NAME);
        $visitor = $this->paperPlayerService->createDumb(self::VISITOR_PLAYER_ID, self::VISITOR_PLAYER_NAME);
        $game = $this->gameService->create($local, $visitor);
        $this->assertEquals(null, $game->getWinner());
        $this->assertEquals(0, $this->sut->getWinsByPlayer($local));
        $this->assertEquals(0, $this->sut->getWinsByPlayer($visitor));
        $this->assertEquals(1, $this->sut->getDraws());
    }

    public function testLocalWinSave() {
        $local = $this->paperPlayerService->createDumb(self::LOCAL_PLAYER_ID, self::LOCAL_PLAYER_NAME);
        $visitor = $this->rockPlayerService->createDumb(self::VISITOR_PLAYER_ID, self::VISITOR_PLAYER_NAME);
        $game = $this->gameService->create($local, $visitor);
        $this->assertEquals($local, $game->getWinner());
        $this->assertEquals(1, $this->sut->getWinsByPlayer($local));
        $this->assertEquals(0, $this->sut->getWinsByPlayer($visitor));
        $this->assertEquals(0, $this->sut->getDraws());
    }

    public function testVisitorWinSave() {
        $local = $this->scissorsPlayerService->createDumb(self::LOCAL_PLAYER_ID, self::LOCAL_PLAYER_NAME);
        $visitor = $this->rockPlayerService->createDumb(self::VISITOR_PLAYER_ID, self::VISITOR_PLAYER_NAME);
        $game = $this->gameService->create($local, $visitor);
        $this->assertEquals($visitor, $game->getWinner());
        $this->assertEquals(0, $this->sut->getWinsByPlayer($local));
        $this->assertEquals(1, $this->sut->getWinsByPlayer($visitor));
        $this->assertEquals(0, $this->sut->getDraws());
    }

    private function getHandServiceMock(Trick $trick): HandService {
        $handService = $this->createMock(HandService::class);
        $handService->method('createWithSingleTrick')
            ->willReturn($this->handService->createWithSingleTrick($trick));
        return $handService;
    }
}
