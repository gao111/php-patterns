<?php

namespace DesignPatterns\Creational\AbstractFactory;

use DesignPatterns\Creational\AbstractFactory\Cache\RedisCache;

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
