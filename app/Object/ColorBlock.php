<?php namespace App\Object;

/**
 * Class ColorBlock
 * @package App\Object
 */
class ColorBlock {

    private $name;
    private $colors = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Make a new color set
     *
     * @param string $block_name
     * @return ColorBlock
     */
    public static function make(string $block_name): self
    {
        return new self($block_name);
    }

    /**
     * Add a color to the set
     *
     * @param Color $color
     * @return array
     */
    public function addColor(Color $color): array
    {
        $this->colors[] = $color;

        return $this->colors;
    }

    /**
     * Get the colors inside the color set
     *
     * @return array
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * Get the name of the color set
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}
