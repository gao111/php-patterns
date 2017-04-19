<?php
/**
 * @name 简单工厂模式
 */

namespace DesignPatterns\Creational\SimpleFactory;

use DesignPatterns\Creational\Prototype\Canvas;

class SimpleFactory
{
    public function createCanvas(): Canvas
    {
        return new Canvas();
    }
}
