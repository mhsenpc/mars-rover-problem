<?php

namespace App\Console\Commands;

use App\Classes\CommandRunner;
use App\Classes\Plateau;
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
        $plateau = null;
        while (!$plateau instanceof Plateau) {
            $input = readline("Enter plateau data: ");
            try {
                $plateau = PlateauFactory::createPlateau($input);
            } catch (\Exception $exception) {
                echo "Invalid arguments. try again\n";
            }
        }

        $rover = null;
        while (!$rover instanceof \App\Classes\Rover) {
            $initial_coordinates = readline("Enter rover initial position: ");

            try {
                $rover = RoverFactory::createRover($initial_coordinates, $plateau);
            } catch
            (\Exception $exception) {
                echo "Invalid arguments. try again\n";
            }
        }

        while ($commands = readline("Enter command to interact with rover: ")) {
            echo CommandRunner::exec($rover, $commands);
            echo "\n";
        }

        return 0;
    }

}
