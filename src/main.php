<?php declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

use \HMC\player\PLUG\PlayerService;
use \HMC\game\PLUG\GameService;
use \HMC\statistic\PLUG\StatisticService;

class main {
    const GAMES = 1000;

    private PlayerService $playerService;
    private GameService $gameService;
    private StatisticService $statisticService;

    public function __construct() {
        echo PHP_EOL . "Starting new PHP(" . phpversion() . ") docked application" . PHP_EOL . PHP_EOL;
        $this->playerService = new PlayerService();
        $this->statisticService = new StatisticService();
        $this->gameService = new GameService($this->statisticService);
        $this->start();
        echo PHP_EOL . "Closing docked application" . PHP_EOL . PHP_EOL;
    }

    private function start(): void {
        $cleverPlayer = $this->playerService->createDefault(1,'John Doe (the clever one)');
        $dumbPlayer = $this->playerService->createDumb(2,'Richard Roe (the dumb one)');
        for ($i = 1; $i <= self::GAMES; $i++) {
            $this->gameService->create($cleverPlayer,$dumbPlayer);
        }
        $this->renderStatistics([$cleverPlayer,$dumbPlayer],$this->statisticService);
    }

    private function renderStatistics(array $players, StatisticService $statistics) {
        echo 'After ' . self::GAMES . ' games' . PHP_EOL;
        foreach ($players as $player) {
            echo 'Player: ' . $player->getName() . ' won ' . $statistics->getWinsByPlayer($player) . PHP_EOL;
        }
        echo 'There were ' . $statistics->getDraws() . ' draws' . PHP_EOL;
    }
}

$app = new main();
