<?php


namespace App\Commands;

use App\Consts\Directions;
use App\Contracts\CommandInterface;
use App\Contracts\RoverInterface;

class RotateRight implements CommandInterface {

    public function execCommand(RoverInterface $rover) {
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
    }
}
