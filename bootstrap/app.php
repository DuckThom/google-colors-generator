<?php

define('BASE_PATH', realpath(__DIR__ . "/../"));

require __DIR__ . "/../vendor/autoload.php";

use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    const NAME = 'Google Color stylesheet variable generator';
    const VERSION = '0.1';

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);
    }
}

/**
 * Generate a path relative to the root directory
 *
 * @param string $path
 * @return string
 */
function base_path(string $path = ''): string
{
    return BASE_PATH . "/{$path}";
}

/**
 * Generate a path relative to the storage directory
 *
 * @param string $path
 * @return string
 */
function storage_path(string $path = ''): string
{
    return base_path('storage/' . $path);
}

$application = new Application();

/**
 * Register the commands
 */
foreach (App\Console\Kernel::$commands as $command) {
    $application->add(new $command);
}

/**
 * Unleash the kraken!
 */
$application->run();