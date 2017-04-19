<?php

namespace DesignPatterns\Behavioral\Strategy;


class SpaceSortStrategy implements StrategyInterface
{
    public function sort($first, $second): int
    {
        return $first <=> $second;
    }
}