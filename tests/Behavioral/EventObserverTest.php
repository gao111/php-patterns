<?php

use PHPUnit\Framework\TestCase;
use DesignPatterns\Behavioral\Observer\{
    Event, Observer
};

class EventObserverTest extends TestCase
{
    /** @var $event Event */
    protected $event;

    protected $observers = [
        'first',
        'second',
        'third'
    ];

    public function setUp()
    {
        parent::setUp();

        $this->event = new Event();

        foreach ($this->observers as $observer) {
            $this->event->addObserver(new Observer($observer));
        }
    }

    public function testEventTrigger()
    {
        $result = $this->event->trigger();

        $this->assertEquals($result, array_map(function ($observer) {
            return sprintf('%s: execute update...', $observer);
        }, $this->observers));
    }
}
