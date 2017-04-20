<?php

namespace DesignPatterns\Creational\AbstractFactory;

use DesignPatterns\Structural\Adapter\CacheInterface;

abstract class AbstractFactory
{
    /**
     * @param $opts
     * @return CacheInterface Instance
     */
    abstract public function createCache(array $opts = []): CacheInterface;
}
