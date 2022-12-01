<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\DA\LaporanModel;
use DB;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{

    //===========================Admin======================//
    public function laporan()
    {
        $laporan = LaporanModel::admin_laporan();

        return view('admin.laporan.index', compact('laporan'), [
            "title" => "Data Laporan"
        ]);
    }

    public function detail_laporan($id_laporan)
    {
        $laporan = LaporanModel::detail_laporan($id_laporan);

        return view('admin.laporan.detail_laporan', compact('laporan'), [
            "title" => "Detail Laporan"
        ]);
    }

    public function admin_hapuslaporan($id_laporan)
    {
        DB::table('laporan')->where('id_laporan', $id_laporan)->delete();
        return redirect('/admin/data-laporan');
    }


    //===========================User======================//
    public function user_laporan()
    {

        $laporan = LaporanModel::user_laporan();

        return view('user.laporan.index', compact('laporan'), [
            "title" => "Data Laporan"
        ]);
    }

    // public function user_inputlaporan()
    // {
    //     // $laporan = LaporanModel::index();
    //     return view('user.laporan.input-laporan', [
    //         "title" => "Tambah Laporan"
    //     ]);
    // }

    public function user_simpanlaporan(request $req)
    {
        $this->validate($req, [
            'title' => 'required',
            'description' => 'required'
        ]);

        LaporanModel::simpanlaporan($req);
        return redirect('/user/data-laporan')->with('success', 'Data Berhasil disimpan.');
    }

    public function user_hapuslaporan($id_laporan)
    {
        DB::table('laporan')->where('id_laporan', $id_laporan)->delete();
        return redirect('/user/data-laporan');
    }
}
