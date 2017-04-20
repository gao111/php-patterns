<?php

use PHPUnit\Framework\TestCase;
use DesignPatterns\Structural\Adapter\CacheInterface;
use DesignPatterns\Creational\AbstractFactory\{
    FileFactory, RedisFactory, AbstractFactory
};

class AbstractFactoryTest extends TestCase
{
    public function getFactories()
    {
        return [[new FileFactory()], [new RedisFactory()]];
    }

    /**
     * @param AbstractFactory $factory
     * @dataProvider getFactories
     */
    public function testCacheCreate(AbstractFactory $factory)
    {
        $cache = $factory->createCache();

        $this->assertInstanceOf(CacheInterface::class, $cache);
    }
}
