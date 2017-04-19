<?php

namespace DesignPatterns\Mvc;


class Model
{
    public static $table;

    /** @var \DesignPatterns\Creational\Singleton\DatabaseInterface $db */
    protected $db;

    protected static $data = [];

    public function __construct()
    {
        $this->db = App::$container['db'];
    }

    public function data()
    {
        return self::$data;
    }

    public function save()
    {
        return $this->db->table($this::$table)->data($this->data())->save();
    }

    public function delete()
    {
        return $this->db->delete();
    }

    /**
     * @param $conditions array
     * @return static
     */
    public static function findOne(array $conditions = [])
    {
        $instance        = new static();
        $instance::$data = $instance->db->table($instance::$table)->where($conditions)->find();

        return $instance;
    }

    public static function findAll()
    {

    }

    public function __get($name)
    {
        if (!isset(static::$data[$name]))
            return null;

        return static::$data[$name];
    }

    public function __set($name, $value)
    {
        static::$data[$name] = $value;
    }
}
