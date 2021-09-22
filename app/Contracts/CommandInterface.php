<?php


namespace App\Contracts;


interface CommandInterface {
    public function execCommand(RoverInterface $rover): RoverInterface;
}
