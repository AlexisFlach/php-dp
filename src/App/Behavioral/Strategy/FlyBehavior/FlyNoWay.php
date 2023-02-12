<?php

namespace App\Behavioral\Strategy\FlyBehavior;

use App\Behavioral\Strategy\Interfaces\FlyBehaviorInterface;

class FlyNoWay implements FlyBehaviorInterface
{
    public function fly()
    {
        echo "I can't fly";
    }
}