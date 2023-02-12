<?php

namespace App\Extras\AdvancedPHPCourse\Traits;

trait Log
{
    public function log($message)
    {
        echo "{$message}\n";
    }
}

class Table
{
    use Log;
}