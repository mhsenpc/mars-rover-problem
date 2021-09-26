<?php


namespace App\Factories;


use App\Classes\Coordinates;
use App\Classes\Plateau;
use App\Classes\Rover;
use App\Consts\Directions;

class RoverFactory {
    public static function createRover(string $initial_coordinates, Plateau $plateau) {
        $initial_coordinates = explode(" ", $initial_coordinates);
        if (count($initial_coordinates) != 3) {
            throw new \InvalidArgumentException('Rover data should be 3 parameters');
        }
        if ($initial_coordinates[0] > $plateau->getMaxWidth()) {
            throw new \InvalidArgumentException('Rover initial x could not be greater than plateau width');
        }

        if ($initial_coordinates[1] > $plateau->getMaxHeight()) {
            throw new \InvalidArgumentException('Rover initial x could not be greater than plateau height');
        }

        $direction = Directions::validateDirection($initial_coordinates[2]);

        $coordinates = new Coordinates($initial_coordinates[0], $initial_coordinates[1]);
        $rover = new Rover($coordinates, $direction, $plateau);
        return $rover;
    }
}
