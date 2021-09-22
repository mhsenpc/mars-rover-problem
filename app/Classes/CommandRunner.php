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
            $current_command = $commands[$i];

            switch (strtoupper($current_command)) {
                case Commands::LEFT:
                    $rover->execCommand(new RotateLeft());
                    break;
                case Commands::RIGHT:
                    $rover->execCommand(new RotateRight());
                    break;
                case Commands::MoveForward:
                    $rover->execCommand(new MoveForward());
                    break;
            }
        }

        return $rover->getCordinates();
    }
}
