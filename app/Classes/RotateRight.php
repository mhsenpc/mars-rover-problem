<?php


namespace App\Classes;


class RotateRight extends Command {

    protected function execCommand($rover) {
        switch ($rover->direction) {
            case Directions::NORTH:
                $rover->direction = Directions::EAST;
                break;

            case Directions::SOUTH:
                $rover->direction = Directions::WEST;
                break;

            case Directions::EAST:
                $rover->direction = Directions::SOUTH;
                break;

            case Directions::WEST:
                $rover->direction = Directions::NORTH;
                break;
        }
        return $rover;
    }
}
