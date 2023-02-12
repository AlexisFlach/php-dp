<?php

namespace App\Behavioral\Observer\Subject;

use App\Behavioral\Observer\Observers\ObserverInterface;

interface SubjectInterface
{
    public function attach(ObserverInterface $observer);

    public function detach(ObserverInterface $observer);

    public function notify();
}