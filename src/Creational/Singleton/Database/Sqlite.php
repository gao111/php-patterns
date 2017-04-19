<?php

namespace DesignPatterns\Creational\Singleton\Database;

use PDO;
use DesignPatterns\Creational\Singleton\{
    DatabaseDriver, DatabaseInterface
};

class Sqlite extends DatabaseDriver implements DatabaseInterface
{
    /** @var $handler PDO */
    protected $handler;

    public function connect(array $config)
    {
        $this->handler = new PDO(sprintf('sqlite:%s', $config['path']));
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
