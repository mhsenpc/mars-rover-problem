<?php


namespace App\Classes;


use App\Consts\Commands;
use App\Contracts\RoverInterface;

class RoverOperator {
    public static function exec(RoverInterface $rover, string $commands) {
        $length = strlen($commands);
        for ($i = 0; $i < $length; $i++) {
            $current_command = Commands::validateCommand($commands[$i]);

            switch (strtoupper($current_command)) {
                case Commands::LEFT:
                    $rover->spinLeft();
                    break;
                case Commands::RIGHT:
                    $rover->spinRight();
                    break;
                case Commands::MoveForward:
                    $rover->moveForward();
                    break;
            }
        }

        return $rover->getMyLocation();
    }
}
