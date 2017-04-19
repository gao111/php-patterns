<?php

namespace DesignPatterns\Behavioral\Strategy;


class BasicSortStrategy implements StrategyInterface
{
    public function sort($first, $second): int
    {
        if ($first > $second)
            return 1;
        else if ($first === $second)
            return 0;

        return -1;
    }
}