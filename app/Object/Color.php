<?php namespace App\Object;

class Color {

    private $weight;
    private $color;

    public function __construct(int $weight, string $color)
    {
        $this->weight = $weight;
        $this->color = $color;
    }

    public function setColor(string $color): Color
    {
        $this->color = $color;

        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

}
