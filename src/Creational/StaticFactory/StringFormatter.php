<?php

namespace DesignPatterns\Creational\StaticFactory;


class StringFormatter implements FormatterInterface
{

    public function format($value): string
    {
        return (string)$value;
    }
}
