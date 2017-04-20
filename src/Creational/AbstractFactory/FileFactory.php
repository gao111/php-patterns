<?php

namespace DesignPatterns\Creational\AbstractFactory;

use DesignPatterns\Structural\Adapter\CacheInterface;
use DesignPatterns\Structural\Adapter\Cache\FileCache;

class FileFactory extends AbstractFactory
{
    /**
     * @param $opts
     * @return CacheInterface Instance
     */
    function createCache(array $opts = []): CacheInterface
    {
        return new FileCache($opts);
    }
}
