<?php


namespace App\Commands;


use App\Classes\Command;
use App\Consts\Directions;
use App\Contracts\CommandInterface;
use App\Contracts\RoverInterface;

class RotateLeft extends Command implements CommandInterface {

    public function execCommand(RoverInterface $rover): RoverInterface {
        switch ($rover->getDirection()) {
            case Directions::NORTH:
                $rover->setDirection(Directions::WEST);
                break;

            case Directions::SOUTH:
                $rover->setDirection(Directions::EAST);
                break;

            case Directions::EAST:
                $rover->setDirection(Directions::NORTH);
                break;

            case Directions::WEST:
                $rover->setDirection(Directions::SOUTH);
                break;
        }
        return $rover;
    }
}
