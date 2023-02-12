<?php

namespace App\Behavioral\Observer\Observers;

interface ObserverInterface
{
    public function update($temperature, $humidity, $pressure);
}