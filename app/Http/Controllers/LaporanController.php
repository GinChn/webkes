<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\DA\LaporanModel;
use App\Exports\AdminLaporanExport;
use App\Exports\UsersLaporanExport;
use DB;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;

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

    public function export()
    {
        return Excel::download(new AdminLaporanExport, 'LaporanLangkah.xlsx');
    }



    //===========================User======================//
    public function user_laporan()
    {

        $laporan = LaporanModel::user_laporan();

        return view('user.laporan.index', compact('laporan'), [
            "title" => "Data Laporan"
        ]);
    }

    public function user_simpanlaporan(request $req)
    {
        LaporanModel::simpanlaporan($req);
        return redirect('/user/data-laporan');
    }

    public function user_hapuslaporan($id_laporan)
    {
        DB::table('laporan')->where('id_laporan', $id_laporan)->delete();
        return redirect('/user/data-laporan');
    }


    public function export_user()
    {
        return Excel::download(new UsersLaporanExport, 'DataLangkah.xlsx');
    }
}
