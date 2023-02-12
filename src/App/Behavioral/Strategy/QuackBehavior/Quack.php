<?php

namespace App\Behavioral\Strategy\QuackBehavior;

use App\Behavioral\Strategy\Interfaces\QuackBehaviorInterface;

class Quack implements QuackBehaviorInterface
{
    public function quack()
    {
        echo "Quack";
    }
}