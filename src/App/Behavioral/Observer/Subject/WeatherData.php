<?php

namespace App\Behavioral\Observer\Subject;

use App\Behavioral\Observer\Observers\ObserverInterface;
use App\Behavioral\Observer\Observers\DisplayElementInterface;

class WeatherData implements SubjectInterface, DisplayElementInterface
{
    private $observers;
    private $temperature;
    private $humidity;
    private $pressure;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(ObserverInterface $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(ObserverInterface $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature, $this->humidity, $this->pressure);
        }
    }

    public function measurementsChanged()
    {
        $this->notify();
    }

    public function setMeasurements($temperature, $humidity, $pressure)
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }

    public function display()
    {
        echo "WeatherData display" . PHP_EOL;
    }
}