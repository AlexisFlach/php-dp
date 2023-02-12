<?php

namespace App\Behavioral\Observer;

use App\Behavioral\Observer\Observers\DisplayElementInterface;

use App\Behavioral\Observer\Observers\CurrentConditionsDisplay;
use App\Behavioral\Observer\Observers\StatisticsDisplay;
use App\Behavioral\Observer\Subject\WeatherData;



class ProgramClass
{
    public static function main()
    {

        $weatherData = new WeatherData();

        $currentDisplay = new CurrentConditionsDisplay($weatherData);
        $statisticsDisplay = new StatisticsDisplay($weatherData);

        $weatherData->setMeasurements(80, 65, 30.4);
        $weatherData->setMeasurements(82, 70, 29.2);
        $weatherData->setMeasurements(78, 90, 29.2);


    }
}