<?php namespace App\Console;

class Kernel {

    /**
     * Store the commands for auto-loading
     *
     * @var array
     */
    public static $commands = [
        Commands\Generate::class,
    ];

}