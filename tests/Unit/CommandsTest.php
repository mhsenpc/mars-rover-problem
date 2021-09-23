<?php

namespace Tests\Unit;

use App\Classes\CommandRunner;
use App\Classes\Plateau;
use App\Consts\Directions;
use PHPUnit\Framework\TestCase;

class CommandsTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_LMLMLMLMM() {
        $plateau = new Plateau(5, 5);
        $rover = new \App\Classes\Rover(1, 2, Directions::NORTH, $plateau);

        $this->assertEquals(
            "1 1 N",
            CommandRunner::exec($rover, "LMLMLMLMM")
        );
    }

    public function test_MMRMMRMRRM() {
        $plateau = new Plateau(5, 5);
        $rover = new \App\Classes\Rover(3, 3, Directions::EAST, $plateau);

        $this->assertEquals(
            "4 4 E",
            CommandRunner::exec($rover, "MMRMMRMRRM")
        );
    }
}
