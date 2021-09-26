<?php

namespace App\Console\Commands;

use App\Classes\CommandRunner;
use App\Factories\PlateauFactory;
use App\Factories\RoverFactory;
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
        $input = readline("Enter plateau data: ");
        $plateau = PlateauFactory::createPlateau($input);

        $initial_coordinates = readline("Enter rover initial position: ");
        $rover = RoverFactory::createRover($initial_coordinates, $plateau);

        while ($commands = readline("Enter command to interact with rover: ")) {
            echo CommandRunner::exec($rover, $commands);
            echo "\n";
        }

        return 0;
    }

}
