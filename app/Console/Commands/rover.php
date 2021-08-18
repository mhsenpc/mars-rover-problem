<?php

namespace App\Console\Commands;

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

    protected $x = 0;
    protected $y = 0;
    protected $max_width = 0;
    protected $max_height = 0;
    protected $direction = "N";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $platue_data = [];
        while (count($platue_data) != 2) {
            $platue = readline("Enter plateau data: ");
            $platue_data = explode(" ", $platue);
        }
        $this->max_width = $platue_data[0];
        $this->max_height = $platue_data[1];

        $initial_coordinates = [];
        while (count($initial_coordinates) != 3 || $initial_coordinates[0] > $this->max_width || $initial_coordinates[1] > $this->max_height) {
            $position = readline("Enter rover initial position: ");
            $initial_coordinates = explode(" ", $position);
        }
        $this->x = $initial_coordinates[0];
        $this->y = $initial_coordinates[1];
        $this->direction = $initial_coordinates[2];


        while ($commands = readline("Enter command to interact with rover: ")) {
            $length = strlen($commands);
            for ($i = 0; $i < $length; $i++) {
                $current_command = $commands[$i];

                switch (strtoupper($current_command)) {
                    case "L":
                        $this->rotateLeft();
                        break;
                    case "R":
                        $this->rotateRight();
                        break;
                    case "M":
                        $this->moveForward();
                        break;
                }

                if ($this->x < 0 || $this->x > $this->max_width || $this->y < 0 || $this->y > $this->max_height) {
                    die("whoops. the rover can not move forward any further");
                }

            }

            echo "{$this->x} {$this->y} {$this->direction}";
            echo "\n";
        }

        return 0;
    }

    protected function rotateLeft() {
        switch ($this->direction) {
            case "N":
                $this->direction = "W";
                break;

            case "S":
                $this->direction = "E";
                break;

            case "E":
                $this->direction = "N";
                break;

            case "W":
                $this->direction = "S";
                break;
        }
    }

    protected function rotateRight() {
        switch ($this->direction) {
            case "N":
                $this->direction = "E";
                break;

            case "S":
                $this->direction = "W";
                break;

            case "E":
                $this->direction = "S";
                break;

            case "W":
                $this->direction = "N";
                break;
        }
    }

    protected function moveForward() {
        switch ($this->direction) {
            case "N":
                if ($this->y + 1 <= $this->max_height)
                    $this->y++;
                break;
            case "S":
                if ($this->y - 1 >= 0)
                    $this->y--;
                break;
            case "E":
                if ($this->x + 1 <= $this->max_width)
                    $this->x++;
                break;
            case "W":
                if ($this->x - 1 >= 0)
                    $this->x--;
                break;
            default:
                break;
        }
    }
}
