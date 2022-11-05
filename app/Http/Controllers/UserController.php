<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //=====================dashboard==========================//
    public function dashboard(){
        return view('user.dashboard.index');
    }
    //========================================================//
    
    //======================Profile============================//
    public function profile(){
        return view('user.profile.index');
    }
    //========================================================//

    //======================laporan===========================//
    public function laporan(){
        return view('user.laporan.index');
    }
    //========================================================//

    //========================BMI=============================//
    public function bmi(){
        return view('user.bmi.index');
    }
    //========================================================//
}
