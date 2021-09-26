<?php


namespace App\Commands;


use App\Consts\Directions;
use App\Contracts\CommandInterface;
use App\Contracts\RoverInterface;

class MoveForward implements CommandInterface {

    public function execCommand(RoverInterface $rover) {
        switch ($rover->getDirection()) {
            case Directions::NORTH:
                if ($rover->getCordinates()->getY() > 0)
                    $rover->getCordinates()->decreaseYBy(1);
                break;
            case Directions::SOUTH:
                if ($rover->getCordinates()->getY() + 1 < $rover->getPlateau()->getMaxHeight())
                    $rover->getCordinates()->increaseYBy(1);
                break;
            case Directions::EAST:
                if ($rover->getCordinates()->getX() + 1 < $rover->getPlateau()->getMaxWidth())
                    $rover->getCordinates()->increaseXBy(1);
                break;
            case Directions::WEST:
                if ($rover->getCordinates()->getX() > 0)
                    $rover->getCordinates()->decreaseXBy(1);
                break;
            default:
                break;
        }
    }
}
