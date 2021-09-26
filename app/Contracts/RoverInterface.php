<?php


namespace App\Contracts;


use App\Classes\Coordinates;

interface RoverInterface {

    public function setDirection(string $direction);

    public function getDirection(): string;

    public function getCoordinates(): Coordinates;

    public function setCoordinates(Coordinates $coordinates): void;

    public function getMyLocation(): string;
}
