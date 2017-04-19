<?php

namespace DesignPatterns\Creational\Decorator;


class FontDecorator implements DrawDecoratorInterface
{

    protected $font;

    public function __construct(string $font)
    {
        $this->font = $font;
    }

    public function beforeDraw()
    {
        printf('<div style="font-family: %s">', $this->font);
    }

    public function afterDraw()
    {
        printf('</div>');
    }
}