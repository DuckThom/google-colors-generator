<?php namespace App\Object;

/**
 * Class ColorBlock
 * @package App\Object
 */
class ColorBlock
{

    /**
     * Name of the color
     *
     * @var string
     */
    private $name;

    /**
     * Array containing Color instances
     *
     * @var array
     */
    private $colors = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Make a new color set
     *
     * @param string $block_name
     * @return ColorBlock
     */
    public static function make($block_name)
    {
        return new self($block_name);
    }

    /**
     * Add a color to the set
     *
     * @param Color $color
     * @return array
     */
    public function addColor(Color $color)
    {
        $this->colors[] = $color;

        return $this->colors;
    }

    /**
     * Get the colors inside the color set
     *
     * @return array
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Get the name of the color set
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
