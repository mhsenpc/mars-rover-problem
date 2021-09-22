<?php


namespace App\Commands;


use App\Classes\Command;
use App\Classes\Rover;
use App\Consts\Directions;
use App\Contracts\CommandInterface;
use App\Contracts\RoverInterface;

class MoveForward extends Command implements CommandInterface {

    public function execCommand(RoverInterface $rover): RoverInterface {
        switch ($rover->getDirection()) {
            case Directions::NORTH:
                if ($rover->getY() - 1 >= 0)
                    $rover->setY($rover->getY() - 1);
                break;
            case Directions::SOUTH:
                if ($rover->getY() + 1 <= $rover->getPlateau()->max_height)
                    $rover->setY($rover->getY() + 1);
                break;
            case Directions::EAST:
                if ($rover->getX() + 1 <= $rover->getPlateau()->max_width)
                    $rover->setX($rover->getX() + 1);
                break;
            case Directions::WEST:
                if ($rover->getX() - 1 >= 0)
                    $rover->setX($rover->getX() - 1);
                break;
            default:
                break;
        }
        return $rover;
    }
}
