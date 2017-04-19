<?php
/**
 * @name 策略模式
*/
namespace DesignPatterns\Behavioral\Strategy;


interface StrategyInterface
{
    public function sort($first, $second): int;
}
