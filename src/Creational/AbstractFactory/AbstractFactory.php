<?php

namespace DesignPatterns\Creational\AbstractFactory;

abstract class AbstractFactory
{
    /**
     * @param $opts
     * @return CacheInterface Instance
     */
    abstract public function createCache(array $opts = []): CacheInterface;
}
