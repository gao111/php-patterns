<?php

use DesignPatterns\Creational\FactoryMethod\DatabaseFactory;
use DesignPatterns\Creational\Singleton\Database\Mysql;
use DesignPatterns\Creational\Singleton\Database\Sqlite;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    /** @var $factory DatabaseFactory */
    protected $factory;

    public function setUp()
    {
        parent::setUp();

        $this->factory = new DatabaseFactory();
    }

    public function testCreateDatabase()
    {
        $mysql = $this->factory->create(DatabaseFactory::MYSQL);
        $this->assertInstanceOf(Mysql::class, $mysql);

        $sqlite = $this->factory->create(DatabaseFactory::SQLITE);
        $this->assertInstanceOf(Sqlite::class, $sqlite);
    }
}
