<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\DA\LaporanModel;
use DB;

class LaporanController extends Controller
{
    public function laporan(){
        return view('admin.laporan.index', [
            "title" => "Data Laporan"
        ]);
    }

    public function inputlaporan()
    {
        $laporan = LaporanModel::index();
        return view('admin.laporan.input-laporan');
    }

    public function simpanlaporan(request $req)
    {
        LaporanModel::simpanlaporan($req);
        return redirect('/data-laporan');
    }
}
