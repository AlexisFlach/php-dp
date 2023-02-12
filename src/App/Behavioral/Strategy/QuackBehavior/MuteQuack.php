<?php

namespace App\Behavioral\Strategy\QuackBehavior;

use App\Behavioral\Strategy\Interfaces\QuackBehaviorInterface;

class MuteQuack implements QuackBehaviorInterface
{
    public function quack()
    {
        echo "<< Silence>>";
    }
}