<?php

use App\Extras\AdvancedPHPCourse\ProgramClass;

use App\Extras\AdvancedPHPCourse\Traits\Table;

require_once(__DIR__ . '/../vendor/autoload.php');



// use Rych\Random\Random;

// $random = new Random();


// echo '<pre>';
// echo $random->getRandomString(32);
// echo '</pre>';

(new Table())->log('Hello World!');