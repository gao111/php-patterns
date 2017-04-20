<?php
/**
 * @name 适配器模式
 */

namespace DesignPatterns\Structural\Adapter;

interface CacheInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key);

    /**
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public function set(string $key, $value): bool;

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * @param string $key
     * @return bool
     */
    public function remove(string $key): bool;
}
