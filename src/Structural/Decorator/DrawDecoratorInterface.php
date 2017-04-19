<?php
/**
 * @name 装饰器模式
*/
namespace DesignPatterns\Structural\Decorator;


interface DrawDecoratorInterface
{
    public function beforeDraw();

    public function afterDraw();
}
