<?php

namespace App\Exceptions;

/**
 * Class DownloadFailedException
 * @package App\Exceptions
 */
class DownloadFailedException extends \Exception
{

    /**
     * DownloadFailedException constructor.
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
