<?php namespace App\Exceptions;

use \Exception;

/**
 * Class UndefinedTypeException
 * @package App\Exceptions
 */
class UndefinedTypeException extends Exception
{
    public function __construct($type, $code = 0, Exception $previous = null)
    {
        $message = "Undefined stylesheet type {$type}";

        parent::__construct($message, $code, $previous);
    }
}
