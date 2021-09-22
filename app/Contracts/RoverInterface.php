<?php


namespace App\Contracts;


interface RoverInterface {
    public function setX(int $x);

    public function getX(): int;

    public function setY(int $y);

    public function getY(): int;

    public function setDirection(string $direction);

    public function getDirection(): string;

    public function execCommand(CommandInterface $command);
}
