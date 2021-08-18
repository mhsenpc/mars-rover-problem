<?php

namespace App\Console\Commands;

use App\Classes\Commands;
use App\Classes\Directions;
use App\Classes\Plateau;
use Illuminate\Console\Command;

class rover extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rover';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $plateau_data = [];
        while (count($plateau_data) != 2) {
            $input = readline("Enter plateau data: ");
            $plateau_data = explode(" ", $input);
        }
        $plateau = new Plateau($plateau_data[0], $plateau_data[1]);

        $initial_coordinates = [];
        while (count($initial_coordinates) != 3 || $initial_coordinates[0] > $plateau->max_width || $initial_coordinates[1] > $plateau->max_height) {
            $position = readline("Enter rover initial position: ");
            $initial_coordinates = explode(" ", $position);
        }
        $rover = new \App\Classes\Rover($initial_coordinates[0], $initial_coordinates[1], $initial_coordinates[2], $plateau);

        while ($commands = readline("Enter command to interact with rover: ")) {
            $length = strlen($commands);
            for ($i = 0; $i < $length; $i++) {
                $current_command = $commands[$i];

                switch (strtoupper($current_command)) {
                    case Commands::LEFT:
                        $rover->rotateLeft();
                        break;
                    case Commands::RIGHT:
                        $rover->rotateRight();
                        break;
                    case Commands::MoveForward:
                        $rover->moveForward();
                        break;
                }
            }

            echo "{$rover->x} {$rover->y} {$rover->direction}";
            echo "\n";
        }

        return 0;
    }

}
