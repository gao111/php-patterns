<?php

namespace DesignPatterns\Mvc;

use InvalidArgumentException;

/**
 * @method App get(string $pattern, Callable $callback)
 * @method App post(string $pattern, Callable $callback)
 * @method App put(string $pattern, Callable $callback)
 * @method App delete(string $pattern, Callable $callback)
 * @method App options(string $pattern, Callable $callback)
 * @method App head(string $pattern, Callable $callback)
 */
class App
{
    public static $container = null;

    /**
     * @param array|Container $container
     */
    public function __construct($container = [])
    {
        if (is_array($container))
            $container = new Container($container);

        if (!$container instanceof Container)
            throw new InvalidArgumentException('Excepted a container');

        self::$container = $container;
    }

    public function __call($method, $params)
    {
        Route::{$method}($params[0], $params[1]);
    }

    public function getContainer()
    {
        return self::$container;
    }

    public function run()
    {
        Route::dispatch($this);
    }
}
