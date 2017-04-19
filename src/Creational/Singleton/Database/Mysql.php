<?php

namespace DesignPatterns\Creational\Singleton\Database;

use DesignPatterns\Creational\Singleton\{
    DatabaseDriver, DatabaseInterface
};
use PDO;

class Mysql extends DatabaseDriver implements DatabaseInterface
{
    /** @var $handler PDO */
    protected $handler;

    protected $options;

    public function connect(array $config)
    {
        $dsn = sprintf('mysql:dbname=%s;host=%s;port=%s', $config['dbname'], $config['host'], $config['port'] ?? 3306);

        $this->options = $config;
        $this->handler = new PDO($dsn, $config['user'], $config['password']);
    }

    public function query(string $sql)
    {
        return $this->handler->query($sql);
    }

    public function execTransaction(array $sqls)
    {
        $result = true;

        $this->handler->beginTransaction();

        foreach ($sqls as $sql) {
            if ($this->query($sql) === 0)
                $result = false;
        }

        if ($result === false)
            $this->handler->rollBack();
        else
            $this->handler->commit();

        return $result;
    }

    public function close()
    {
        unset($this->handler);
    }
}
