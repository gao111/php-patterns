<?php

namespace DesignPatterns\Creational\Singleton;


interface DatabaseInterface
{
    public function connect(array $config);

    public function query(string $sql);

    public function execTransaction(array $sqls);

    public function close();
}
