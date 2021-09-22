<?php


namespace App\Commands;


use App\Classes\Command;
use App\Consts\Directions;

class RotateRight extends Command {

    protected function execCommand($rover) {
        switch ($rover->getDirection()) {
            case Directions::NORTH:
                $rover->setDirection(Directions::EAST);
                break;

            case Directions::SOUTH:
                $rover->setDirection(Directions::WEST);
                break;

            case Directions::EAST:
                $rover->setDirection(Directions::SOUTH);
                break;

            case Directions::WEST:
                $rover->setDirection(Directions::NORTH);
                break;
        }
        return $rover;
    }
}
