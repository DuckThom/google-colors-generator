<?php namespace App\Object;

/**
 * Class Color
 * @package App\Object
 */
class Color {

    private $weight;
    private $color;

    public function __construct(string $weight, string $color)
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
    public function setColor(string $color): Color
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the hexadecimal color code
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Get the strength of the color
     *
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

}
