<?php

namespace DesignPatterns\Creational\AbstractFactory\Cache;

use DesignPatterns\Creational\AbstractFactory\CacheInterface;
use Redis;

class RedisCache implements CacheInterface
{
    /** @var $handler Redis */
    protected static $handler;

    public function __construct(array $opts)
    {
        $host = $opts['host'] ?? '127.0.0.1';
        $port = $opts['port'] ?? 6379;

        self::$handler = new Redis();
        self::$handler->connect($host, $port);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return unserialize(self::$handler->get($key));
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public function set(string $key, $value): bool
    {
        return self::$handler->set($key, serialize($value));
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return self::$handler->exists($key);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function remove(string $key): bool
    {
        return self::$handler->del($key);
    }
}
