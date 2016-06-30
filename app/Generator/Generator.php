<?php

namespace App\Generator;

use App\Exceptions\DownloadFailedException;
use App\Helpers\Downloader;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

/**
 * Class Generator
 * @package App\Generator
 */
class Generator
{

    /**
     * Downloader instance
     *
     * @var Downloader
     */
    protected $dl;

    /**
     * Name of the downloaded file
     *
     * @var string
     */
    protected $filename;

    /**
     * Generator constructor.
     */
    public function __construct()
    {
        // Create a new Downloader instance
        $this->dl = new Downloader("https://material.google.com/style/color.html");
    }

    /**
     * Start the generator
     *
     * @param  string $ext
     * @param  array $params
     */
    public static function generate($ext = '', $params = [])
    {
        $g = new static;
        $g->execute($ext, $params);
    }

    /**
     * Run the generator
     *
     * @param  string $ext
     * @param  array $params
     */
    protected function execute($ext = '', $params)
    {
        $this->before($params);
        $this->run($ext, $params);
        $this->after($params);
    }

    /**
     * Code to run before the generation
     *
     * @param  array $params
     * @throws DownloadFailedException
     * @throws FileNotFoundException
     * @return void
     */
    protected function before($params)
    {
        if (!$params['cache'] && !$params['pretend']) {
            $this->download();
        } else {
            if (file_exists(storage_path('source.html')) || $params['pretend']) {
                echo "Loading source HTML from cache...\n";

                $this->filename = 'source.html';
            } else {
                $this->download();
            }
        }
    }

    /**
     * Download the source HTML
     *
     * @throws DownloadFailedException
     */
    protected function download()
    {
        echo "Downloading source HTML...\n";

        // Run the download
        $this->dl->run(storage_path());

        if ($this->dl->isDownloaded()) {
            // Store the downloaded file name
            $this->filename = $this->dl->getFilename();
        } else {
            throw new DownloadFailedException("Whoops, it looks like the download failed.");
        }
    }

    /**
     * Stylesheet generation code
     *
     * @param  string $ext
     * @param  array $params
     */
    protected function run($ext, $params)
    {
        echo "Generating {$ext}\n";

        // parent::run() in extending class
    }

    /**
     * Code to run after the generation
     *
     * @param  array $params
     * @return void
     */
    protected function after($params)
    {
        $filePath = storage_path($this->filename);

        if (file_exists($filePath) && !$params['cache']) {
            echo "Removing source HTML...\n";

            unlink($filePath);
        }
    }
}
