<?php namespace Tests;

use App\Helpers\Parser;
use App\Object\Color;
use App\Object\ColorBlock;

class ParserTest extends \PHPUnit_Framework_TestCase
{

    public function testParseDownload()
    {
        $array = Parser::parseDownload(tests_path('files/source.html'));
        
        $this->assertTrue(is_array($array));

        foreach ($array as $colorBlock) {
            $colors = $colorBlock->getColors();

            $this->assertInstanceOf(ColorBlock::class, $colorBlock);
            $this->assertNotNull($colorBlock->getName());
            $this->assertNotEquals([], $colors);

            foreach ($colors as $color) {
                $this->assertInstanceOf(Color::class, $color);
                $this->assertNotNull($color->getWeight());
                $this->assertNotNull($color->getColor());
            }
        }
    }

}
