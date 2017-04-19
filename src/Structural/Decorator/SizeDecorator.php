<?php

namespace DesignPatterns\Structural\Decorator;


class SizeDecorator implements DrawDecoratorInterface
{
    protected $size;

    public function __construct(int $size = 14)
    {
        $this->size = $size;
    }

    public function beforeDraw()
    {
        printf('<div style="font-size:%spx">', $this->size);
    }

    public function afterDraw()
    {
        printf('</div>');
    }
}
