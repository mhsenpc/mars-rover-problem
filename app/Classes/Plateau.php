<?php


namespace App\Classes;


class Plateau {

    /**
     * @var int
     */
    public $max_width;
    /**
     * @var int
     */
    public $max_height;

    /**
     * @return int
     */
    public function getMaxWidth(): int {
        return $this->max_width;
    }

    /**
     * @return int
     */
    public function getMaxHeight(): int {
        return $this->max_height;
    }

    public function __construct(int $max_width, int $max_height) {
        $this->max_width = $max_width;
        $this->max_height = $max_height;
    }


}
