<?php

namespace App\Http\Controllers;

use App\DA\BmiModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BmiController extends Controller
{
    //===========================Admin======================//
    public function bmi(){
        $bmi = BmiModel::bmi();
        return view('admin.bmi.index', compact('bmi'), [
            "title" => "BMI"
        ]);
    }

    //===========================USer======================//
    public function user_bmi(){
        $bmi = BmiModel::bmi();
        return view('user.bmi.index', compact('bmi'), [
            "title" => "BMI"
        ]);
    }
}
