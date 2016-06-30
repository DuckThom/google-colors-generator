<?php namespace App\Console;

/**
 * Class Kernel
 * @package App\Console
 */
class Kernel
{

    /**
     * Store the commands for auto-loading
     *
     * @var array
     */
    public static $commands = [
        Commands\GenerateStylesheet::class,
    ];
}
