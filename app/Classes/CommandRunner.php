<?php


namespace App\Classes;


use App\Commands\MoveForward;
use App\Commands\RotateLeft;
use App\Commands\RotateRight;
use App\Consts\Commands;
use App\Contracts\RoverInterface;

class CommandRunner {
    public static function exec(RoverInterface $rover, string $commands) {
        $length = strlen($commands);
        for ($i = 0; $i < $length; $i++) {
            $current_command = Commands::validateCommand($commands[$i]);

            switch (strtoupper($current_command)) {
                case Commands::LEFT:
                    $command = new RotateLeft();
                    $command->execCommand($rover);
                    break;
                case Commands::RIGHT:
                    $command = new RotateRight();
                    $command->execCommand($rover);
                    break;
                case Commands::MoveForward:
                    $command = new MoveForward();
                    $command->execCommand($rover);
                    break;
            }
        }

        return $rover->getMyLocation();
    }
}
