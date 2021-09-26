<?php


namespace App\Classes;


use App\Commands\MoveForward;
use App\Commands\SpinLeft;
use App\Commands\SpinRight;
use App\Contracts\CommandInterface;
use App\Contracts\RoverInterface;

class Rover implements RoverInterface {

    private $coordinates;

    /**
     * @return Coordinates
     */
    public function getCoordinates(): Coordinates {
        return $this->coordinates;
    }

    /**
     * @param Coordinates $coordinates
     */
    public function setCoordinates(Coordinates $coordinates): void {
        $this->coordinates = $coordinates;
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

    public function __construct(Coordinates $coordinates, string $direction, Plateau $plateau) {
        $this->coordinates = $coordinates;
        $this->direction = $direction;
        $this->plateau = $plateau;
    }

    public function getMyLocation(): string {
        return "{$this->getCoordinates()->getX()} {$this->getCoordinates()->getY()} {$this->getDirection()}";
    }

    public function moveForward(){
        $command = new MoveForward();
        $command->execCommand($this);
    }

    public function spinLeft(){
        $command = new SpinLeft();
        $command->execCommand($this);
    }

    public function spinRight(){
        $command = new SpinRight();
        $command->execCommand($this);
    }
}
