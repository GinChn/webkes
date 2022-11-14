<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KaryawanController extends Controller
{
    public function karyawan(){
        return view('admin.karyawan.index');
    }
}
