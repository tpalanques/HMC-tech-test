<?php

class  Loader {
    protected static array $dirs = [];
    protected static int $registered = 0;

    public function __construct($dirs = []) {
        self::init($dirs);
    }

    protected static function loadFile($file): bool {
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public static function autoLoad($class): bool {
        $success = false;
        $fn = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        foreach (self::$dirs as $start) {
            $file = $start . DIRECTORY_SEPARATOR . $fn;
            if (self::loadFile($file)) {
                $success = true;
                break;
            }
        }
        if (!$success) {
            if (!self::loadFile(__DIR__ . DIRECTORY_SEPARATOR . $fn)) {
                throw new \Exception(
                    '[CORE][LOADER] Can\'t find class :  ' . $class);
            }
        }
        return $success;
    }

    public static function addDirs($dirs): void {
        if (is_array($dirs)) {
            self::$dirs = array_merge(self::$dirs, $dirs);
        } else {
            self::$dirs[] = $dirs;
        }
    }

    public static function init($dirs = []): void {
        if ($dirs) {
            self::addDirs($dirs);
        }
        if (self::$registered == 0) {
            spl_autoload_register(__CLASS__ . '::autoload');
            self::$registered++;
        }

    }
}
