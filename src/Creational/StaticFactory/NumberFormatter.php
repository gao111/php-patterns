<?php

namespace DesignPatterns\Creational\StaticFactory;


class NumberFormatter implements FormatterInterface
{

    public function format($value): int
    {
        return (int)$value;
    }
}
