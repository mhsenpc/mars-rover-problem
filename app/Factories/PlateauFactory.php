<?php


namespace App\Factories;


use App\Classes\Plateau;

class PlateauFactory {
    public static function createPlateau(string $input): Plateau {
        $plateau_data = explode(" ", $input);
        if (count($plateau_data) != 2) {
            throw new \InvalidArgumentException('Plateau data should contain only two numbers');
        }

        $plateau = new Plateau($plateau_data[0], $plateau_data[1]);
        return $plateau;
    }
}
