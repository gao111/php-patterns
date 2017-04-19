<?php

namespace DesignPatterns\Behavioral\Observer;


abstract class EventGenerator
{
    private $observers = [];

    public function addObserver(ObserverInterface $observer)
    {
        return array_push($this->observers, $observer);
    }

    public function notify($notifyInfo = null): array
    {
        return array_map(function (ObserverInterface &$observer) use ($notifyInfo) {

            return $observer->update($notifyInfo);

        }, $this->observers);
    }
}
