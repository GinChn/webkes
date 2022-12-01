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
                ->select('users.nama', 'laporan.nik', 'laporan.langkah', 'laporan.created_at')
                ->get();
            // dd($laporan);
            $user = DB::table('users')->get();

            $data = DashboardModel::rekap_langkah();
            return view('admin.dashboard.index', compact('admins', 'users', 'laporan', 'user'), [
                "title" => "Dashboard"
            ]);
        } else {
            $laporan = DB::table('laporan')
                ->select('nik', 'langkah', 'created_at')
                ->where('nik', session('auth')->nik)
                ->get();
            $grafik = DashboardModel::rekap_langkah_user();
            $bmi = DashboardModel::rekap_bmi_user();
            return view('user.dashboard.tampilan-grafik', compact('grafik', 'bmi', 'laporan'), [
                "title" => "Dashboard"
            ]);
        }
    }

    // public function dashboard_grafik()
    // {
    //     $grafik = DashboardModel::rekap_langkah();
    //     return view('admin.dashboard.detail-grafik', compact('grafik'), [
    //         "title" => "Detail Grafik"
    //     ]);
    // }

    public function user_grafik($nik)
    {
        $grafik = DashboardModel::rekap_langkah($nik);
        $bmi = DashboardModel::rekap_bmi($nik);
        return view('admin.dashboard.user-grafik', compact('grafik', 'bmi'), [
            "title" => "User Grafik"
        ]);
    }
}
