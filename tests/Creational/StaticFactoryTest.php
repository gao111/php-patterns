<?php

use PHPUnit\Framework\TestCase;
use DesignPatterns\Creational\StaticFactory\{
    StaticFactory, NumberFormatter, StringFormatter
};

class StaticFactoryTest extends TestCase
{
    public function testCreateNumberFormatter()
    {
        $this->assertInstanceOf(NumberFormatter::class, StaticFactory::factory(StaticFactory::TYPE_NUMBER));
    }

    public function testCreateStringFormatter()
    {
        $this->assertInstanceOf(StringFormatter::class, StaticFactory::factory(StaticFactory::TYPE_STRING));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExcepthon()
    {
        StaticFactory::factory('object');
    }
}
