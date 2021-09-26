<?php


namespace App\Classes;


use App\Contracts\CommandInterface;
use App\Contracts\RoverInterface;

class Rover implements RoverInterface {

    private $cordinates;

    /**
     * @return Cordinates
     */
    public function getCordinates(): Cordinates {
        return $this->cordinates;
    }

    /**
     * @param Cordinates $cordinates
     */
    public function setCordinates(Cordinates $cordinates): void {
        $this->cordinates = $cordinates;
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
     * @var Plateau
     */
    private $plateau;
    /**
     * @var string
     */
    private $direction;

    public function __construct(Cordinates $cordinates, string $direction, Plateau $plateau) {
        $this->cordinates = $cordinates;
        $this->direction = $direction;
        $this->plateau = $plateau;
    }

    public function getMyLocation(): string {
        return "{$this->getCordinates()->getX()} {$this->getCordinates()->getY()} {$this->getDirection()}";
    }
}
