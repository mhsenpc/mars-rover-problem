<?php


namespace App\Classes;


use App\Commands\MoveForward;
use App\Commands\RotateLeft;
use App\Commands\RotateRight;
use App\Consts\Commands;
use Illuminate\Pipeline\Pipeline;

class CommandRunner {
    public static function exec($rover, string $commands) {
        $commands_list = [];
        $length = strlen($commands);
        for ($i = 0; $i < $length; $i++) {
            $current_command = $commands[$i];

            switch (strtoupper($current_command)) {
                case Commands::LEFT:
                    $commands_list [] = new RotateLeft();
                    break;
                case Commands::RIGHT:
                    $commands_list [] = new RotateRight();
                    break;
                case Commands::MoveForward:
                    $commands_list [] = new MoveForward();
                    break;
            }
        }

        return app(Pipeline::class)
            ->send($rover)
            ->through($commands_list)
            ->thenReturn()
            ->getCordinates();
    }
}
