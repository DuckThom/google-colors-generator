<?php namespace App\Generator;

use App\Helper\Parser;
use App\Helper\Downloader;
use Illuminate\Filesystem\Filesystem;

/**
 * Class SCSSGenerator
 * @package App\Generator
 */
class SCSSGenerator {

    public static function generate()
    {
        $dl = new Downloader("https://www.google.com/design/spec/style/color.html");
        $dl->run(storage_path());

        $fs     = new Filesystem();
        $colors = Parser::parseDownload();
        $path   = storage_path('output.scss');
        $text   = "";

        foreach ($colors as $name => $color_block) {

            if (count($color_block->getColors()) === 10) {
                $text .= '// ----- ' . $color_block->getName() . ' ----- \\\\' ."\r\n";

                foreach ($color_block->getColors() as $color) {
                    $text .= "$" . str_replace(" ", "-", strtolower($color_block->getName())) . "-" . $color->getWeight() . ": " . $color->getColor() . ";\r\n";
                }

                $text .= "\r\n";
            }

        }

        //var_dump($text);
        $fs->put($path, $text);
    }

}
