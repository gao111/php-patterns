<?php
/**
 * @name 单例模式
 * 保证一个类仅有一个实例
 */

namespace DesignPatterns\Creational\Singleton;

trait SingletonTrait
{
    /** @var $instance static */
    protected static $instance = [];

    private function __construct()
    {
    }

    final public static function getInstance()
    {
        if (!isset(static::$instance[static::class]))
            static::$instance[static::class] = new static();

        return static::$instance[static::class];
    }

    final private function __clone()
    {
    }

    final private function __wakeup()
    {
    }
}
