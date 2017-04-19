<?php
/**
 * @name 工厂方法模式
 */

namespace DesignPatterns\Creational\FactoryMethod;

use DesignPatterns\Creational\Singleton\DatabaseInterface;

abstract class FactoryMethod
{
    const MYSQL  = 'mysql';
    const SQLITE = 'sqlite';

    abstract protected function createDatabase(string $type): DatabaseInterface;

    public function create(string $type): DatabaseInterface
    {
        return $this->createDatabase($type);
    }
}
