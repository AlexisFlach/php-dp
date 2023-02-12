<?php

namespace App\Extras\AdvancedPHPCourse;

// require_once(__DIR__ . '/../../../vendor/autoload.php');

use Rych\Random\Random;

class ProgramClass
{
    // create a private number property
    private $number;
    public static function main()
    {
        echo '<pre>';
        echo StringGenerator::generateNumber();
        echo '</pre>';
        echo "This is the main method from the AdvancedPHPCourse namespace ";
    }
}


class StringGenerator
{
    public static function generateNumber(): string
    {
        $random = new Random();
        return $random->getRandomString(32);
    }
}