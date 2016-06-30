<?php

namespace Tests\Helpers;

use App\Helpers\Console;

class ConsoleTest extends \PHPUnit_Framework_TestCase {

    public function testCallMethodWithExistingCommand()
    {
        $code = Console::call('', ['-V'], $output);

        $this->assertEquals($output[0], APP_NAME . " version " . APP_VERSION);
        $this->assertEquals(0, $code);
    }

}