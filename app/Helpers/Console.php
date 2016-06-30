<?php

namespace App\Helpers;

class Console
{

    /**
     * Run a console command
     *
     * @param  string $command
     * @param  array $arguments
     * @param  array $output
     * @return int
     */
    public static function call($command, $arguments = [], &$output = [])
    {
        $exitCode   = 0;
        $cmd        = self::buildCommand($command, $arguments);

        exec('cd ' . base_path() . "; php console {$cmd}", $output, $exitCode);

        return $exitCode;
    }

    /**
     * Build the command string for exec
     *
     * @param  string $command
     * @param  array $arguments
     * @return string
     */
    private static function buildCommand($command, $arguments)
    {
        foreach ($arguments as $argument) {
            $command .= " {$argument}";
        }

        return $command;
    }
}
