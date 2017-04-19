<?php

namespace DesignPatterns\Behavioral\Observer;


class Event extends EventGenerator
{
    public function trigger()
    {
        echo 'event happened...' . PHP_EOL;

        return $this->notify('execute update...');
    }
}
