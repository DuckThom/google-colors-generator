<?php namespace App\Generator;

use App\Helpers\Parser;
use App\Helpers\Downloader;
use Illuminate\Filesystem\Filesystem;
use App\Exceptions\UndefinedTypeException;

/**
 * Class SCSSGenerator
 * @package App\Generator
 */
class StylesheetGenerator {

    /**
     * Generate the SCSS file
     */
    public static function generate(string $type)
    {
        switch ($type) {
            case 'scss':
                $var_sign = '$';
                break;
            case 'less':
                $var_sign = '@';
                break;
            default:
                throw new UndefinedTypeException($type);
        }

        $dl = new Downloader("https://www.google.com/design/spec/style/color.html");
        $dl->run(storage_path());

        $fs     = new Filesystem();
        $colors = Parser::parseDownload();
        $path   = storage_path('output.' . strtolower($type));
        $text   = "";

        foreach ($colors as $name => $color_block) {

            if (count($color_block->getColors()) >= 10) {
                $text .= '// ----- ' . $color_block->getName() . ' ----- \\\\' ."\r\n";

                foreach ($color_block->getColors() as $color) {
                    $text .= $var_sign . str_replace(" ", "-", strtolower($color_block->getName())) . "-" . $color->getWeight() . ": " . $color->getColor() . ";\r\n";
                }

                $text .= "\r\n";
            }

        }

        $fs->put($path, $text);
    }

}
