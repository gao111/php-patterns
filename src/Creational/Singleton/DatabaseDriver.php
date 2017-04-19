<?php

namespace DesignPatterns\Creational\Singleton;

use InvalidArgumentException;

/**
 * @method DatabaseDriver table($name): self
 * @method DatabaseDriver where($conditions): self
 */
abstract class DatabaseDriver implements DatabaseInterface
{
    use SingletonTrait;

    /** @var $handler \PDO */
    protected $handler;

    protected $options;

    protected $lastSql = null;

    protected $conditions = [];

    public function insert($table, array $data)
    {
        $sql = 'INSERT INTO ' . $this->tableQuote($table) . ' (`' . implode('`,`',
                array_keys($data)) . '`) VALUES ("' . implode('","', array_values($data)) . '")';

        return $this->query($sql);
    }

    public function query(string $sql)
    {
        $this->lastSql = $sql;

        return $this->handler->query($sql)->fetch(SQL_FETCH_FIRST);
    }

    public function tableQuote(string $table = null): string
    {
        return sprintf('`%s%s`', $this->options['prefix'] ?? '', $table ?? $this->conditions['table']);
    }

    public function __call($method, $params)
    {
        $allowedMethods = ['table', 'where', 'order', 'limit', 'data', 'field', 'join', 'group', 'having'];

        if (empty($params) || !in_array($method, $allowedMethods)) {
            throw new InvalidArgumentException(sprintf('Invalid arguments for function [%s]', $method));
        }

        switch ($method) {
            case 'table':
                $this->conditions['table'] = $params[0];
                break;
            case 'field':
                $this->conditions['field'] = implode($params[0], ', ');
                break;
            case 'where':
                if (is_array($params[0])) {
                    $conditions = [];
                    foreach ($params[0] as $key => $item)
                        array_push($conditions, sprintf('`%s` = "%s"', $key, $item));

                    $this->conditions['where'] = implode($conditions, ' and ');
                } else if (is_string($params[0])) {
                    $this->conditions['where'] = $params[0];
                }
                break;
        }

        return $this;
    }

    public function save()
    {
        if (isset($this->conditions['where'])) {
            $sql = 'UPDATE ' . $this->tableQuote() . ' SET ' . $this->conditions['data'] . ' WHERE ' . $this->conditions['where'];
        } else {
            $sql = '';
        }

        var_dump($sql);
        exit;

        return $this->query($sql);
    }

    public function find()
    {
        $field = $this->conditions['field'] ?? '*';

        $sql = 'SELECT ' . $field . ' FROM ' . $this->tableQuote() . ' WHERE ' . $this->conditions['where'];

        return $this->query($sql);
    }

}
