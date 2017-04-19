<?php

use DesignPatterns\Creational\Singleton\Database\Sqlite;
use DesignPatterns\Mvc\{
    App, Container, Request, Response, View
};

define('BASE_PATH', realpath(__DIR__ . '/../../../'));

require BASE_PATH . '/vendor/autoload.php';

/**
 * @desc 依赖注入
 */
$container = new Container();

$container['view'] = function () {
    return new View();
};

$container['db'] = function () {
    $sqlite = Sqlite::getInstance();
    $sqlite->connect(['path' => BASE_PATH . '/config/mvc.db']);

    return $sqlite;
};

$container['request'] = function () {
    return new Request();
};

$container['response'] = function () {
    return new Response();
};

$app = new App($container);

/**
 * @desc 路由表
 */
$defaultNamespace = 'DesignPatterns\\Mvc\\Controller\\';

$app->get('/', $defaultNamespace . 'HelloController@index');
$app->get('/user/:num', $defaultNamespace . 'UserController@info');
$app->put('/user/:num', $defaultNamespace . 'UserController@edit');
$app->post('/user/:num', $defaultNamespace . 'UserController@create');
$app->delete('/user/:num', $defaultNamespace . 'UserController@delete');

/**
 * @desc 启动应用
 */
$app->run();
