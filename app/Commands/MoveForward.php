<?php


namespace App\Commands;


use App\Classes\Command;
use App\Consts\Directions;

class MoveForward extends Command {

    protected function execCommand($rover) {
        switch ($rover->direction) {
            case Directions::NORTH:
                if ($rover->y - 1 >= 0)
                    $rover->y--;
                break;
            case Directions::SOUTH:
                if ($rover->y + 1 <= $rover->plateau->max_height)
                    $rover->y++;
                break;
            case Directions::EAST:
                if ($rover->x + 1 <= $rover->plateau->max_width)
                    $rover->x++;
                break;
            case Directions::WEST:
                if ($rover->x - 1 >= 0)
                    $rover->x--;
                break;
            default:
                break;
        }
        return $rover;
    }
}
