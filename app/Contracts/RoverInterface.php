<?php


namespace App\Contracts;


use App\Classes\Cordinates;

interface RoverInterface {

    public function setDirection(string $direction);

    public function getDirection(): string;

    public function getCordinates(): Cordinates;

    public function setCordinates(Cordinates $cordinates): void;

    public function getMyLocation(): string;
}
