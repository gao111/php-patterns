<?php

use DesignPatterns\Creational\Prototype\Canvas;
use DesignPatterns\Creational\Prototype\ColorDecorator;
use DesignPatterns\Creational\Prototype\FontDecorator;
use DesignPatterns\Creational\Prototype\SizeDecorator;

require 'vendor/autoload.php';

$prototype = new Canvas();
$prototype->init();

$prototype->addDecorator(new ColorDecorator('green'));
$prototype->addDecorator(new SizeDecorator(12));
$prototype->addDecorator(new FontDecorator('Monaco'));

$canvas1 = clone $prototype;
$canvas1->rect(3, 6, 4, 12);
$canvas1->draw();

echo '<hr>';


$canvas2 = clone $prototype;
$canvas2->rect(1, 3, 2, 6);
$canvas2->draw();
