<?php

namespace App;

define('BASE_PATH', realpath(__DIR__ . "/../"));

/**
 * Load the composer modules
 */
require __DIR__ . "/../vendor/autoload.php";

use Symfony\Component\Console\Application as BaseApplication;

/**
 * Class Application
 */
class Application extends BaseApplication
{
    /**
     * Package name
     */
    const NAME = 'Google Color stylesheet variable generator';

    /**
     * Package version
     */
    const VERSION = '1.0';

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);
    }
}

/**
 * Create a new application instance
 */
$application = new Application();

/**
 * Register the commands
 */
foreach (Console\Kernel::$commands as $command) {
    $application->add(new $command);
}

/**
 * Unleash the kraken!
 */
$application->run();

return $application;
