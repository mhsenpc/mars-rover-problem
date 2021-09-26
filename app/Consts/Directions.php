<?php


namespace App\Consts;


class Directions {
    const NORTH = "N";
    const EAST = "E";
    const WEST = "W";
    const SOUTH = "S";
    const VALID_DIRECTIONS = ['N', 'E', 'W', 'S'];

    public static function isDirectionValid(string $direction): bool {
        return in_array(strtoupper($direction), self::VALID_DIRECTIONS);
    }

    public static function validateDirection(string $direction):string{
        if(self::isDirectionValid($direction)){
            return strtoupper($direction);
        }
        throw new \InvalidArgumentException('Entered direction is not valid.Valid directions are N,E,W,S');
    }
}
