<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LaporanController extends Controller
{
    public function laporan(){
        return view('admin.laporan.index');
    }
}
