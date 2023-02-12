<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Behavioral\Strategy\MallardDuck\MallardDuck;
use PHPUnit\Framework\TestCase;


class MallardDuckTest extends TestCase
{
    public function testMallardDuck()
    {
        $mallardDuck = new MallardDuck();

        $this->assertEquals("I'm a real Mallard duck", $mallardDuck->display());
    }
}