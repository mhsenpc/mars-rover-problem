<?php


namespace App\Classes;


class Cordinates {
    private $x;
    private $y;

    /**
     * Cordinates constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getX() {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x): void {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY() {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y): void {
        $this->y = $y;
    }

    public function increaseXBy(int $number){
        self::setX(self::getX() + $number);
    }

    public function decreaseXBy(int $number){
        self::setX(self::getX() - $number);
    }

    public function increaseYBy(int $number){
        self::setY(self::getY() + $number);
    }

    public function decreaseYBy(int $number){
        self::setY(self::getY() - $number);
    }

}
