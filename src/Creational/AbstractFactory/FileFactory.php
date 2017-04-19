<?php

namespace DesignPatterns\Creational\AbstractFactory;

use DesignPatterns\Creational\AbstractFactory\Cache\FileCache;

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
