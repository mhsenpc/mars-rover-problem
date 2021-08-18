<?php


namespace App\Classes;


class Rover {
    /**
     * @var int
     */
    public $x;
    /**
     * @var int
     */
    public $y;
    /**
     * @var Plateau
     */
    public $plateau;
    /**
     * @var string
     */
    public $direction;

    public function __construct(int $x, int $y, string $direction, Plateau $plateau) {
        $this->x = $x;
        $this->y = ($plateau->max_height - $y) + 1;
        $this->direction = $direction;
        $this->plateau = $plateau;
    }

    public function getCordinates() {
        return "{$this->x} {$this->y} {$this->direction}";
    }
}
