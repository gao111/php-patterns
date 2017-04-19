<?php

use DesignPatterns\Creational\Prototype\Canvas;
use DesignPatterns\Creational\SimpleFactory\SimpleFactory;
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    public function testCreateCanvas()
    {
        $canvas = (new SimpleFactory())->createCanvas();
        $this->assertInstanceOf(Canvas::class, $canvas);
    }
}
