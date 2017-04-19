<?php

namespace DesignPatterns\Behavioral\Observer;

interface ObserverInterface
{
    public function update($eventInfo = null);
}
