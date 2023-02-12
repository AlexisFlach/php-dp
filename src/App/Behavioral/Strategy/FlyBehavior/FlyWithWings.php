<?php

namespace App\Behavioral\Strategy\FlyBehavior;

use App\Behavioral\Strategy\Interfaces\FlyBehaviorInterface;

class FlyWithWings implements FlyBehaviorInterface
{
    public function fly()
    {
        echo "I'm flying!!";
    }
}