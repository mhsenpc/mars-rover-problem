<?php


namespace App\Classes;

abstract class Command {
    public function handle($request, \Closure $next) {
        $rover = $next($request);
        return $this->execCommand($rover);
    }

    protected abstract function execCommand($rover);
}
