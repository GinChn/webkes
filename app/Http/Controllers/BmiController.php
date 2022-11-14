<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BmiController extends Controller
{
    public function bmi(){
        return view('admin.bmi.index');
    }
}
