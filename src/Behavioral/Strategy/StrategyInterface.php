<?php

namespace DesignPatterns\Behavioral\Strategy;


interface StrategyInterface
{
    public function sort($first, $second): int;
}
