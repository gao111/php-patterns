<?php
/**
 * @name 观察者模式
 * 定义对象间的一种一对多的依赖关系，当一个对象的状态发生改变时，所有依赖于它的对象都得到通知并被自动更新【GOF95】
 */

namespace DesignPatterns\Behavioral\Observer;


class Observer implements ObserverInterface
{
    private $observerName = null;

    public function __construct(string $name)
    {
        $this->observerName = $name;
    }

    public function update($eventInfo = null)
    {
        return sprintf('%s: %s', $this->observerName, $eventInfo);
    }
}
