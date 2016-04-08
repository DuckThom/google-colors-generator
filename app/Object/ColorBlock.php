<?php namespace App\Object;

class ColorBlock {

    private $name;
    private $colors = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function make(string $block_name): self
    {
        return new self($block_name);
    }

    public function addColor(Color $color): array
    {
        $this->colors[] = $color;

        return $this->colors;
    }

    public function delColor(int $weight): bool
    {
        if (isset($this->colors[$weight])) {
            unset($this->colors[$weight]);

            return true;
        } else {
            return false;
        }
    }

    public function getColors(): array
    {
        return $this->colors;
    }

    public function getName(): string
    {
        return $this->name;
    }

}
