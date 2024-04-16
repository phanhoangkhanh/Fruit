<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Helper 
{
    protected $defer = true;
    public static function getKhanh($a)
    {
        return $a + 1;
    }

}