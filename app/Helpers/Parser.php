<?php namespace App\Helpers;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\DomCrawler\Crawler;
use App\Object\ColorBlock;
use App\Object\Color;

/**
 * Class Parser
 * @package App\Helpers
 */
class Parser {

    /**
     * Parse the downloaded HTML file
     *
     * @param  string  $sourcePath
     * @return array Array with ColorBlocks
     */
    public static function parseDownload(string $sourcePath = null): array
    {
        $colors = [];
        $fs     = new Filesystem();
        $html   = $fs->get($sourcePath ?: storage_path('source.html'));

        $crawler = new Crawler($html);

        $crawler->filter('.color-group')->each(function (Crawler $node, $i) use(&$colors) {
            preg_match("/([a-zA-Z\s]+)/", $node->text(), $matches);
            $name = trim($matches[1]);
            preg_match_all("/(A?[0-9]+)(\#[0-9a-zA-Z]+)/", $node->text(), $matches);

            $cb = ColorBlock::make($name);

            for ($i = 0; $i < count($matches[1]); $i++) {
                $cb->addColor(new Color($matches[1][$i], $matches[2][$i]));
            }

            $colors[] = $cb;
        });

        return $colors;
    }

}
