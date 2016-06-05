<?php namespace Tests;

use App\Helpers\Parser;

class ParserTest extends TestCase
{

    public function testCorrectSourceFile()
    {
        $this->assertTrue(is_array(Parser::parseDownload(tests_path('files/source.html'))));
    }

}
