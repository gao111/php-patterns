<?php

use PHPUnit\Framework\TestCase;
use DesignPatterns\Creational\AbstractFactory\{
    CacheInterface, FileFactory, RedisFactory, AbstractFactory
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

    /**
     * @param AbstractFactory $factory
     * @dataProvider getFactories
     */
    public function testCacheMethods(AbstractFactory $factory)
    {
        $cache = $factory->createCache();

        $key   = 'cache';
        $value = ['values'];

        $this->assertTrue($cache->set($key, $value));

        $this->assertEquals($value, $cache->get($key));

        $this->assertTrue($cache->remove($key));

        $this->assertFalse($cache->has($key));
    }
}
