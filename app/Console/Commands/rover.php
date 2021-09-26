<?php

namespace App\Console\Commands;

use App\Classes\CommandRunner;
use App\Classes\Commands;
use App\Classes\Cordinates;
use App\Classes\Directions;
use App\Classes\MoveForward;
use App\Classes\Plateau;
use App\Classes\RotateLeft;
use App\Classes\RotateRight;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;

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
        while (count($initial_coordinates) != 3 || $initial_coordinates[0] > $plateau->getMaxWidth() || $initial_coordinates[1] > $plateau->getMaxHeight()) {
            $position = readline("Enter rover initial position: ");
            $initial_coordinates = explode(" ", $position);
        }
        $cordinates = new Cordinates($initial_coordinates[0], $initial_coordinates[1]);
        $rover = new \App\Classes\Rover($cordinates, $initial_coordinates[2], $plateau);

        while ($commands = readline("Enter command to interact with rover: ")) {
            echo CommandRunner::exec($rover, $commands);
            echo "\n";
        }

        return 0;
    }

}
