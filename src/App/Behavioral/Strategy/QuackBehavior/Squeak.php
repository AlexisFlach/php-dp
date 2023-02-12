<?php

namespace App\Behavioral\Strategy\QuackBehavior;

use App\Behavioral\Strategy\Interfaces\QuackBehaviorInterface;

class Squeak implements QuackBehaviorInterface
{
    public function quack()
    {
        echo "Squeak";
    }
}