<?php declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

class main {

    static public function start(): void {
        echo PHP_EOL . "Starting new PHP(" . phpversion() . ") docked application" . PHP_EOL . PHP_EOL;
    }
}

main::start();
