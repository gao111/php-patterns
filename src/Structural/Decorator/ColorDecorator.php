<?php

namespace DesignPatterns\Structural\Decorator;


class ColorDecorator implements DrawDecoratorInterface
{
    protected $color;

    public function __construct(string $color = '')
    {
        $this->color = $color;
    }

    public function beforeDraw()
    {
        printf('<div style="color:%s">', $this->color);
    }

    public function afterDraw()
    {
        printf('</div>');
    }
}
