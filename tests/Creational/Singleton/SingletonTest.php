<?php

use DesignPatterns\Creational\Singleton\Database\Sqlite;
use DesignPatterns\Creational\Singleton\DatabaseInterface;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testSingleton()
    {
        $firstDatabase = Sqlite::getInstance();

        $this->assertInstanceOf(DatabaseInterface::class, $firstDatabase);

        $secondDatabase = Sqlite::getInstance();

        $this->assertSame($firstDatabase, $secondDatabase);
    }
}
