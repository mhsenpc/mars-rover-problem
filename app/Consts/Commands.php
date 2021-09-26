<?php


namespace App\Consts;


class Commands {
    const LEFT = "L";
    const RIGHT = "R";
    const MoveForward = "M";
    const VALID_COMMANDS = ['L', 'R', 'M'];

    public static function validateCommand(string $command): string {
        if (in_array(strtoupper($command), self::VALID_COMMANDS)) {

            return strtoupper($command);
        }
        throw new \InvalidArgumentException('Entered command is not valid. Valid commands are L,R,M');
    }
}
