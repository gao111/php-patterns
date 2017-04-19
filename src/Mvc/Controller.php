<?php

namespace DesignPatterns\Mvc;

/**
 * @property View $view
 * @property \DesignPatterns\Creational\Singleton\Database\Sqlite $db
 * @property Request $request
 * @property Response $response
 */
class Controller
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function __get($name)
    {
        return $this->container->offsetGet($name);
    }

}
