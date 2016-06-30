<?php

namespace App\Generator;

use App\Helpers\Parser;
use Illuminate\Filesystem\Filesystem;
use App\Exceptions\UndefinedTypeException;

/**
 * Class SassGenerator
 * @package App\Generator
 */
class SassGenerator extends Generator
{

    /**
     * Generate the Scss/Sass file
     *
     * @param  string $ext
     * @param  array $params
     * @throws UndefinedTypeException
     */
    protected function run($ext, $params)
    {
        $fs     = new Filesystem;
        $colors = Parser::parseDownload();
        $path   = storage_path('colors.' . strtolower($ext));
        $text   = "";

        foreach ($colors as $name => $color_block) {
            if (count($color_block->getColors()) >= 10) {
                $text .= '// ----- ' . $color_block->getName() . ' ----- \\\\' ."\r\n";

                foreach ($color_block->getColors() as $color) {
                    $text .= '$' . str_replace(" ", "-", strtolower($color_block->getName())) . "-" . $color->getWeight() . ": " . $color->getColor() . ";\r\n";
                }

                $text .= "\r\n";
            }
        }

        if (!$params['pretend']) {
            $fs->put($path, $text);
        } else {
            echo "Pretending to write file...\n";
        }
    }
}
