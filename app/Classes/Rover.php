<?php


namespace App\Classes;


class Rover {
    /**
     * @var int
     */
    private $x;

    /**
     * @return int
     */
    public function getX(): int {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX(int $x): void {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY(): int {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY(int $y): void {
        $this->y = $y;
    }

    /**
     * @return Plateau
     */
    public function getPlateau(): Plateau {
        return $this->plateau;
    }

    /**
     * @param Plateau $plateau
     */
    public function setPlateau(Plateau $plateau): void {
        $this->plateau = $plateau;
    }

    /**
     * @return string
     */
    public function getDirection(): string {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction): void {
        $this->direction = $direction;
    }
    /**
     * @var int
     */
    private $y;
    /**
     * @var Plateau
     */
    private $plateau;
    /**
     * @var string
     */
    private $direction;

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
