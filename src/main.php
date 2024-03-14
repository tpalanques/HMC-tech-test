<?php declare(strict_types=1);

use core\Loader;

require __DIR__ . '/core/Loader.php';
Loader::init([0 => getcwd()]);


class main {

    static public function start(): void {
        echo PHP_EOL."Starting new docked application".PHP_EOL.PHP_EOL;
    }
}

main::start();
