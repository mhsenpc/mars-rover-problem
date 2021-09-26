<?php


namespace App\Commands;


use App\Consts\Directions;
use App\Contracts\CommandInterface;
use App\Contracts\RoverInterface;

class MoveForward implements CommandInterface {

    public function execCommand(RoverInterface $rover) {
        switch ($rover->getDirection()) {
            case Directions::NORTH:
                if ($rover->getCoordinates()->getY() > 0)
                    $rover->getCoordinates()->decreaseYBy(1);
                break;
            case Directions::SOUTH:
                if ($rover->getCoordinates()->getY() + 1 < $rover->getPlateau()->getMaxHeight())
                    $rover->getCoordinates()->increaseYBy(1);
                break;
            case Directions::EAST:
                if ($rover->getCoordinates()->getX() + 1 < $rover->getPlateau()->getMaxWidth())
                    $rover->getCoordinates()->increaseXBy(1);
                break;
            case Directions::WEST:
                if ($rover->getCoordinates()->getX() > 0)
                    $rover->getCoordinates()->decreaseXBy(1);
                break;
            default:
                break;
        }
    }
}
