<?php

namespace Tests\Console\Commands;

use App\Helpers\Console;
use Tests\TestCase;

class GenerateStylesheetTest extends \PHPUnit_Framework_TestCase
{
    public function testSassGeneration()
    {
        $file = storage_path('colors.sass');
        $code = Console::call('generate:style', ['sass', '--cache']);

        $this->assertEquals(0, $code);
        $this->assertTrue(file_exists($file));
        $this->assertTrue(file_get_contents($file) !== '');
    }

    public function testScssGeneration()
    {
        $file = storage_path('colors.scss');
        $code = Console::call('generate:style', ['scss', '--cache']);

        $this->assertEquals(0, $code);
        $this->assertTrue(file_exists($file));
        $this->assertTrue(file_get_contents($file) !== '');
    }

    public function testLessGeneration()
    {
        $file = storage_path('colors.less');
        $code = Console::call('generate:style', ['less', '--cache']);

        $this->assertEquals(0, $code);
        $this->assertTrue(file_exists($file));
        $this->assertTrue(file_get_contents($file) !== '');
    }
}
