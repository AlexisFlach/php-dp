<?php

namespace App\Behavioral\Observer\Tests;

use App\Behavioral\Observer\ConcreteObserver;

class ConcreteObserverUpdateTest extends \PHPUnit_Framework_TestCase
{
    public function testUpdate()
    {
        $observer = new ConcreteObserver();
        $observer->update('hello');
        $this->assertEquals('hello', $observer->getHello());
    }
}