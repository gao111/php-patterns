<?php
/**
 * @name 单例模式
 * 保证一个类仅有一个实例
 */

namespace DesignPatterns\Creational\Singleton;

trait SingletonTrait
{
    /** @var $instance static */
    protected static $instance = null;

    private function __construct()
    {
    }

    final public static function getInstance()
    {
        if (self::$instance === null)
            self::$instance = new static;

        return self::$instance;
    }

    final private function __clone()
    {
    }

    final private function __wakeup()
    {
    }
}
