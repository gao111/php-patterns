<?php

use DesignPatterns\Structural\Adapter\Cache\FileCache;
use DesignPatterns\Structural\Adapter\Cache\RedisCache;
use DesignPatterns\Structural\Adapter\CacheInterface;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    public function getCaches()
    {
        return [[new RedisCache()], [new FileCache()]];
    }

    /**
     * @param CacheInterface $cache
     * @dataProvider getCaches
     */
    public function testCacheMethods(CacheInterface $cache)
    {
        $key   = 'cache';
        $value = ['values'];

        $this->assertTrue($cache->set($key, $value));

        $this->assertEquals($value, $cache->get($key));

        $this->assertTrue($cache->remove($key));

        $this->assertFalse($cache->has($key));
    }
}
