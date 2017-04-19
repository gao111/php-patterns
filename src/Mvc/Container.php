<?php

namespace DesignPatterns\Mvc;


use ArrayAccess;
use InvalidArgumentException;
use RuntimeException;
use SplObjectStorage;

class Container implements ArrayAccess
{

    private $factories;

    private $protected;

    private $frozen = [];

    private $values = [];

    private $keys = [];

    private $raw = [];

    public function __construct(array $container = [])
    {
        $this->factories = new SplObjectStorage();
        $this->protected = new SplObjectStorage();

        foreach ($container as $key => $item)
            $this->offsetSet($key, $item);
    }

    public function offsetGet($id)
    {
        if (!isset($this->keys[$id]))
            throw new InvalidArgumentException(sprintf('Identifier %s is not defined', $id));

        if (
            isset($this->raw[$id])
            || !is_object($this->values[$id])
            || isset($this->protected[$this->values[$id]])
            || !method_exists($this->values[$id], '__invoke')
        ) {
            return $this->values[$id];
        }

        if (isset($this->factories[$this->values[$id]])) {
            return $this->values[$id]($this);
        }

        $raw = $this->values[$id];
        $val = $this->values[$id] = $raw($this);

        return $val;
    }


    public function offsetExists($id)
    {
        return isset($this->keys[$id]);
    }

    public function offsetSet($id, $value)
    {
        if (isset($this->frozen[$id]))
            throw new RuntimeException(sprintf('Cannot override service %s', $id));

        $this->values[$id] = $value;
        $this->keys[$id]   = true;
    }

    public function offsetUnset($id)
    {
        if (isset($this->keys[$id])) {
            if (is_object($this->values[$id])) {
                unset($this->factories[$this->values[$id]], $this->protected[$this->values[$id]]);
            }

            unset($this->values[$id], $this->frozen[$id], $this->raw[$id], $this->keys[$id]);
        }
    }

    public function keys()
    {
        return array_keys($this->values);
    }
}
