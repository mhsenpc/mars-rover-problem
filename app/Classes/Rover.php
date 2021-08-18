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

    public function __construct(int $x, int $y, string $direction,Plateau $plateau) {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
        $this->plateau = $plateau;
    }


    public function rotateLeft() {
        switch ($this->direction) {
            case Directions::NORTH:
                $this->direction = Directions::WEST;
                break;

            case Directions::SOUTH:
                $this->direction = Directions::EAST;
                break;

            case Directions::EAST:
                $this->direction = Directions::NORTH;
                break;

            case Directions::WEST:
                $this->direction = Directions::SOUTH;
                break;
        }
    }

    public function rotateRight() {
        switch ($this->direction) {
            case Directions::NORTH:
                $this->direction = Directions::EAST;
                break;

            case Directions::SOUTH:
                $this->direction = Directions::WEST;
                break;

            case Directions::EAST:
                $this->direction = Directions::SOUTH;
                break;

            case Directions::WEST:
                $this->direction = Directions::NORTH;
                break;
        }
    }

    public function moveForward() {
        switch ($this->direction) {
            case Directions::NORTH:
                if ($this->y + 1 <= $this->plateau->max_height)
                    $this->y++;
                break;
            case Directions::SOUTH:
                if ($this->y - 1 >= 0)
                    $this->y--;
                break;
            case Directions::EAST:
                if ($this->x + 1 <= $this->plateau->max_width)
                    $this->x++;
                break;
            case Directions::WEST:
                if ($this->x - 1 >= 0)
                    $this->x--;
                break;
            default:
                break;
        }
    }
}
