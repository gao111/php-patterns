<?php
/**
 * 具体工厂角色(Concrete Creator)
 * 实现抽象产品角色所定义的接口，并且工厂方法模式所创建的每一个对象都是某具体产品对象的实例
 */

namespace DesignPatterns\Creational\FactoryMethod;

use DesignPatterns\Creational\Singleton\Database\Mysql;
use DesignPatterns\Creational\Singleton\Database\Sqlite;
use DesignPatterns\Creational\Singleton\DatabaseInterface;
use InvalidArgumentException;

class DatabaseFactory extends FactoryMethod
{
    protected function createDatabase(string $type): DatabaseInterface
    {
        switch ($type) {
            case parent::MYSQL:
                return Mysql::getInstance();
            case parent::SQLITE:
                return Sqlite::getInstance();
            default:
                throw new InvalidArgumentException(sprintf('%s is not valid type', $type));
        }
    }
}
