<?php

namespace Tests\Helpers;

class FunctionsTest extends \PHPUnit_Framework_TestCase
{
    public function testPathHelpers()
    {
        $this->assertTrue(function_exists('base_path'));
        $this->assertTrue(function_exists('storage_path'));
        $this->assertTrue(function_exists('app_path'));
        $this->assertTrue(function_exists('tests_path'));
    }
}
