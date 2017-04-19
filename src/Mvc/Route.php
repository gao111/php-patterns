<?php

namespace DesignPatterns\Mvc;

/**
 * @method static Route get(string $pattern, Callable $callback)
 * @method static Route post(string $pattern, Callable $callback)
 * @method static Route put(string $pattern, Callable $callback)
 * @method static Route delete(string $pattern, Callable $callback)
 * @method static Route options(string $pattern, Callable $callback)
 * @method static Route head(string $pattern, Callable $callback)
 */
class Route
{

    private static $routes = [];

    private static $methods = [];

    private static $callbacks = [];

    private static $patterns = [
        ':num' => '([0-9]+)',
        ':all' => '.*'
    ];

    private static $errorHandler = null;

    public static function __callStatic($method, $params)
    {
        $uri      = dirname($_SERVER['PHP_SELF']) . '/' . $params[0];
        $callabck = $params[1];

        array_push(self::$routes, $uri);
        array_push(self::$methods, strtoupper($method));
        array_push(self::$callbacks, $callabck);
    }

    public static function error(Callable $errorHandler)
    {
        self::$errorHandler = $errorHandler;
    }

    public static function dispatch(App $app)
    {
        $uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $searches = array_keys(static::$patterns);
        $replaces = array_values(static::$patterns);

        self::$routes = preg_replace('/\/+/', '/', self::$routes);

        if (in_array($uri, self::$routes)) {
            $pos = array_keys(self::$routes, $uri);

            foreach ($pos as $route) {
                if (self::$methods[$route] === $method) {

                    if (!is_object(self::$callbacks[$route])) {

                        $segments = explode('@', self::$callbacks[$route]);

                        $controller = new $segments[0]($app->getContainer());

                        $controller->{$segments[1]}();
                    }
                }
            }
        } else {
            foreach (self::$routes as $index => $route) {
                if (strpos($route, ':') !== false) {
                    $route = str_replace($searches, $replaces, $route);

                    if (preg_match('#^' . $route . '$#', $uri, $matched)) {
                        if (self::$methods[$index] === $method) {
                            $segments = explode('@', self::$callbacks[$index]);

                            $controller = new $segments[0]($app->getContainer());

                            return call_user_func([$controller, $segments[1]], $matched[1]);
                        }
                    }
                }
            }

            if (self::$errorHandler === null) {
                self::$errorHandler = function () {
                };
            }

            call_user_func(self::$errorHandler);
        }
    }
}
