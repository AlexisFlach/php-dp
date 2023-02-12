<?php

namespace App\Behavioral\Strategy\Duck;

use App\Behavioral\Strategy\Interfaces\FlyBehaviorInterface;
use App\Behavioral\Strategy\Interfaces\QuackBehaviorInterface;

class Duck
{
    protected $flyBehavior;
    protected $quackBehavior;

    public function __construct(FlyBehaviorInterface $flyBehavior, QuackBehaviorInterface $quackBehavior)
    {
        $this->flyBehavior = $flyBehavior;
        $this->quackBehavior = $quackBehavior;
    }

    public function setFlyBehavior(FlyBehaviorInterface $flyBehavior)
    {
        $this->flyBehavior = $flyBehavior;
    }

    public function setQuackBehavior(QuackBehaviorInterface $quackBehavior)
    {
        $this->quackBehavior = $quackBehavior;
    }

    public function display()
    {
        echo "I'm a duck";
    }

    public function performFly()
    {
        $this->flyBehavior->fly();
    }

    public function performQuack()
    {
        $this->quackBehavior->quack();
    }

    public function swim()
    {
        echo "All ducks float, even decoys!";
    }
}