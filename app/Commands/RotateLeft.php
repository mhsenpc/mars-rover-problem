<?php


namespace App\Commands;


use App\Classes\Command;
use App\Consts\Directions;

class RotateLeft extends Command {

    protected function execCommand($rover) {
        switch ($rover->direction) {
            case Directions::NORTH:
                $rover->direction = Directions::WEST;
                break;

            case Directions::SOUTH:
                $rover->direction = Directions::EAST;
                break;

            case Directions::EAST:
                $rover->direction = Directions::NORTH;
                break;

            case Directions::WEST:
                $rover->direction = Directions::SOUTH;
                break;
        }
        return $rover;
    }
}
