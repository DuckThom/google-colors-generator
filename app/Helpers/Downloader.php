<?php

namespace App\Helpers;

use Illuminate\Filesystem\Filesystem;

/**
 * Class Downloader
 * @package App\Helper
 */
class Downloader {

    /**
     * Path of the file to be downloaded
     *
     * @var
     */
    private $source;

    /**
     * Curl handle
     *
     * @var
     */
    private $ch;

    /**
     * The name of the downloaded file
     *
     * @var string
     */
    private $filename;

    /**
     * Indicates if the download has been executed
     *
     * @var bool
     */
    private $downloaded = false;

    /**
     * Download information
     *
     * @var bool
     */
    private $info = false;

    public function __construct($source)
    {
        $this->source = $source;
        $this->ch = curl_init($source);

        // Show download progress by default
        curl_setopt($this->ch, CURLOPT_NOPROGRESS, true);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * Set a curl option
     *
     * @param  $option
     * @param  $value
     * @return bool
     */
    public function setCurlOption($option, $value)
    {
        return curl_setopt($this->ch, $option, $value);
    }

    /**
     * Get the name of the downloaded file
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Check if the download has been finished
     *
     * @return bool
     */
    public function isDownloaded()
    {
        return $this->downloaded;
    }

    /**
     * Try to download the file
     *
     * @param  string $path
     * @param  string $name
     * @return bool
     */
    public function run($path, $name = 'source.html')
    {
        $fullPath   = "{$path}/{$name}";
        $data       = curl_exec($this->ch);
        $this->info = curl_getinfo($this->ch);

        curl_close($this->ch);

        $fs = new Filesystem();

        if ($fs->isWritable($path)) {
            // Write to file
            $fs->put($fullPath, $data);

            $this->filename     = $name;
            $this->downloaded   = true;

            return true;
        } else {
            return false;
        }
    }
}