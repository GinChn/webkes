<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function karyawan(){
        $data = DB::table('users')->get();
        return view('admin.karyawan.index', compact('data'), [
            "title" => "Data Karyawan"
        ]);
    }
}
