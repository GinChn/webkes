<?php

namespace App\Http\Controllers;

use App\DA\DashboardModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $admins = User::where('id_level', '1')->count();
        $users = User::where('id_level', '2')->count();
        if (session('auth')->level_name == 'Admin') {
            $laporan = DB::table('laporan')
                ->join('users', 'laporan.nik', '=', 'users.nik')
                ->select('users.nama', 'laporan.langkah', 'laporan.created_at')
                ->get();
            // dd($laporan);

            $data = DashboardModel::rekap_langkah();
            return view('admin.dashboard.index', compact('admins', 'users', 'laporan'), [
                "title" => "Dashboard"
            ]);
        } else {
            return view('user.dashboard.index', compact('admins', 'users'), [
                "title" => "Dashboard"
            ]);
        }
    }

    public function dashboard_grafik()
    {
        $grafik = DashboardModel::rekap_langkah();
        return view('admin.dashboard.detail-grafik', compact('grafik'), [
            "title" => "Detail Grafik"
        ]);
    }
}
