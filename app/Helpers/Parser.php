<?php namespace App\Helpers;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\DomCrawler\Crawler;
use App\Object\ColorBlock;
use App\Object\Color;

/**
 * Class Parser
 * @package App\Helpers
 */
class Parser
{

    /**
     * Parse the downloaded HTML file
     *
     * @param  string $sourcePath
     * @return array
     */
    public static function parseDownload($sourcePath = null)
    {
        $colors = [];
        $fs     = new Filesystem();
        $html   = $fs->get($sourcePath ?: storage_path('source.html'));

        $crawler = new Crawler($html);

        // Loop through the html block with the CSS class .color-group
        $crawler->filter('.color-group')->each(function (Crawler $node) use (&$colors) {
            // Match the raw name
            preg_match("/([a-zA-Z\s]+)/", $node->text(), $matches);
            $name = trim($matches[1]);

            // Match the color strength
            preg_match_all("/(A?[0-9]+)(\#[0-9a-zA-Z]+)/", $node->text(), $matches);

            // Create a new color block with the name of the color
            $cb = ColorBlock::make($name);

            // Loop through the colors
            for ($i = 0; $i < count($matches[1]); $i++) {
                $cb->addColor(new Color($matches[1][$i], $matches[2][$i]));
            }

            if (count($cb->getColors()) > 0) {
                $colors[] = $cb;
            }
        });

        return $colors;
    }
}
