<?php

namespace DesignPatterns\Creational\AbstractFactory;

use DesignPatterns\Structural\Adapter\CacheInterface;
use DesignPatterns\Structural\Adapter\Cache\RedisCache;

class RedisFactory extends AbstractFactory
{

    /**
     * @param array $opts
     * @return CacheInterface Instance
     */
    function createCache(array $opts = []): CacheInterface
    {
        return new RedisCache($opts);
    }
}
