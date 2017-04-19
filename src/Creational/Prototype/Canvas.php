<?php
/**
 * @name 原型模式
 */

namespace DesignPatterns\Creational\Prototype;

use DesignPatterns\Structural\Decorator\DrawDecoratorInterface;

class Canvas
{

    /** @var $data array */
    public $data = [];

    /** @var $decorators array */
    protected $decorators = [];

    public function init(int $width = 20, int $height = 10)
    {
        for ($i = 0; $i < $height; $i++)
            for ($j = 0; $j < $width; $j++)
                $this->data[$i][$j] = '*';
    }

    public function addDecorator(DrawDecoratorInterface $decorator)
    {
        array_push($this->decorators, $decorator);
    }

    public function beforeDraw()
    {
        foreach ($this->decorators as $decorator)
            $decorator->beforeDraw();
    }

    public function afterDraw()
    {
        foreach (array_reverse($this->decorators) as $decorator)
            $decorator->afterDraw();
    }

    public function draw()
    {
        $this->beforeDraw();

        foreach ($this->data as $line) {
            foreach ($line as $char)
                echo $char;
            echo '<br/>';
        }

        $this->afterDraw();
    }

    public function rect($a1, $a2, $b1, $b2)
    {
        foreach ($this->data as $k1 => $line) {
            if ($k1 < $a1 || $k1 > $a2)
                continue;

            foreach ($line as $k2 => $char) {
                if ($k2 < $b1 || $k2 > $b2)
                    continue;

                $this->data[$k1][$k2] = '&nbsp;';
            }
        }
    }
}
