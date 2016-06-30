<?php namespace App\Object;

/**
 * Class Color
 * @package App\Object
 */
class Color {

    /**
     * Strength of the color
     *
     * @var string
     */
    private $weight;

    /**
     * The hex code representing the color
     *
     * @var string
     */
    private $color;

    public function __construct($weight, $color)
    {
        $this->weight = $weight;
        $this->color = $color;
    }

    /**
     * Set the hexadecimal color code
     *
     * @param string $color
     * @return Color
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the hexadecimal color code
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Get the strength of the color
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

}
