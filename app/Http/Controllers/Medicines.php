<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Medicines extends Controller
{
    public function Name(){


        return response(['created'=>true],200);
    }
}