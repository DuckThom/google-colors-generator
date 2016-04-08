<?php namespace App\Helper;

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
     * Download information
     *
     * @var bool
     */
    private $info = false;

    public function __construct(string $source)
    {
        $this->source = $source;
        $this->ch = curl_init($source);

        // Show download progress by default
        curl_setopt($this->ch, CURLOPT_NOPROGRESS, false);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * Set a curl option
     *
     * @param $option
     * @param $value
     * @return bool
     */
    public function setCurlOption($option, $value): bool
    {
        return curl_setopt($this->ch, $option, $value);
    }

    /**
     * Try to download the file
     *
     * @param string $path
     * @param string $name
     * @return bool
     */
    public function run(string $path, string $name = 'source.html'): bool
    {
        $fullPath   = "{$path}/{$name}";
        $data       = curl_exec($this->ch);
        $this->info = curl_getinfo($this->ch);

        curl_close($this->ch);

        $fs = new Filesystem();

        if ($fs->isWritable($path)) {
            $fs->put($fullPath, $data);
            return true;
        } else {
            return false;
        }
    }
}