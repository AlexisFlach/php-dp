<?php

namespace App\Behavioral\Strategy\MallardDuck;

use App\Behavioral\Strategy\FlyBehavior\FlyWithWings;
use App\Behavioral\Strategy\QuackBehavior\Quack;
use App\Behavioral\Strategy\Duck\Duck;

class MallardDuck extends Duck
{
    public function __construct()
    {
        parent::__construct(new FlyWithWings(), new Quack());
    }

    public function display()
    {
        return "I'm a real Mallard duck";
    }
}