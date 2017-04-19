<?php

use DesignPatterns\Behavioral\Strategy\{
    BasicSortStrategy, SpaceSortStrategy, StrategyInterface
};
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
    public function getStrategy()
    {
        return [
            [new SpaceSortStrategy()],
            [new BasicSortStrategy()]
        ];
    }

    /**
     * @param $strategy StrategyInterface
     * @dataProvider getStrategy
     */
    public function testStrategy(StrategyInterface $strategy)
    {
        $unsorted = [31, 41, 59, 26, 53, 58];

        usort($unsorted, [$strategy, 'sort']);

        $this->assertEquals([26, 31, 41, 53, 58, 59], $unsorted);
    }
}

