<?php

namespace DesignPatterns\Structural\Adapter\Cache;


use DesignPatterns\Structural\Adapter\CacheInterface;

class FileCache implements CacheInterface
{
    protected static $path;

    public function __construct(array $opts = [])
    {
        self::$path = $opts['path'] ?? '/tmp';
        $mode       = $opts['mode'] ?? 0777;

        if(!is_dir(self::$path))
            mkdir(self::$path, $mode);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return json_decode(file_get_contents(self::cachePath($key)));
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public function set(string $key, $value): bool
    {
        return file_put_contents(self::cachePath($key), json_encode($value));
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return file_exists(self::cachePath($key));
    }

    /**
     * @param string $key
     * @return bool
     */
    public function remove(string $key): bool
    {
        return unlink(self::cachePath($key));
    }

    /**
     * @desc get cache absolute path
     * @param string $name
     * @return string
     */
    public function cachePath(string $name): string
    {
        return sprintf('%s/%s.json', self::$path, $name);
    }
}
