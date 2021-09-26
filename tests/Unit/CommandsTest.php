<?php

namespace Tests\Unit;

use App\Classes\RoverOperator;
use App\Classes\Coordinates;
use App\Classes\Plateau;
use App\Consts\Directions;
use App\Factories\RoverFactory;
use PHPUnit\Framework\TestCase;

class CommandsTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_LMLMLMLMM() {
        $plateau = new Plateau(5, 5);
        $coordinates = new Coordinates(1,2);

        $rover = new \App\Classes\Rover($coordinates, Directions::NORTH, $plateau);

        $this->assertEquals(
            "1 1 N",
            RoverOperator::exec($rover, "LMLMLMLMM")
        );
    }

    public function test_MMRMMRMRRM() {
        $plateau = new Plateau(5, 5);
        $coordinates = new Coordinates(3,3);
        $rover = new \App\Classes\Rover($coordinates, Directions::EAST, $plateau);

        $this->assertEquals(
            "4 4 E",
            RoverOperator::exec($rover, "MMRMMRMRRM")
        );
    }
}
