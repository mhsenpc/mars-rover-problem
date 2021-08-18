<?php


namespace App\Classes;

abstract class Command {
    public function handle($request, \Closure $next) {
        $builder = $next($request);
        return $this->exec($builder);
    }

    public abstract function exec($builder);
}
