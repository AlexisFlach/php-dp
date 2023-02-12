<?php

namespace App\Behavioral\Observer\Observers;

use App\Behavioral\Observer\Subject\SubjectInterface;

class StatisticsDisplay implements ObserverInterface
{
    private $maxTemp = 0.0;
    private $minTemp = 200;
    private $tempSum = 0.0;
    private $numReadings;
    private $weatherData;

    public function __construct(SubjectInterface $weatherData)
    {
        $this->weatherData = $weatherData;
        $weatherData->attach($this);
    }

    public function update($temperature, $humidity, $pressure)
    {
        $this->tempSum += $temperature;
        $this->numReadings++;

        if ($temperature > $this->maxTemp) {
            $this->maxTemp = $temperature;
        }

        if ($temperature < $this->minTemp) {
            $this->minTemp = $temperature;
        }

        $this->display();
    }

    public function display()
    {
        echo "Avg/Max/Min temperature = " . ($this->tempSum / $this->numReadings)
            . "/" . $this->maxTemp . "/" . $this->minTemp . PHP_EOL;
    }
}