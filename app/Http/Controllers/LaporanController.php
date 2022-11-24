<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\DA\LaporanModel;
use DB;

class LaporanController extends Controller
{
    //===========================Admin======================//
    public function laporan()
    {
        return view('admin.laporan.index', [
            "title" => "Data Laporan"
        ]);
    }

    //===========================User======================//
    public function user_laporan()
    {
        return view('user.laporan.index', [
            "title" => "Data Laporan"
        ]);
    }

    public function inputlaporan()
    {
        $laporan = LaporanModel::index();
        return view('user.laporan.input-laporan', [
            "title" => "Tambah Laporan"
        ]);
    }

    public function simpanlaporan(request $req)
    {
        LaporanModel::simpanlaporan($req);
        return redirect('/user/data-laporan');
    }
}
