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
            $user = DB::table('users')
                ->where('id_level', 2)
                ->get();

            $data = DashboardModel::rekap_langkah();
            return view('admin.dashboard.index', compact('admins', 'users', 'laporan', 'user'), [
                "title" => "Dashboard"
            ]);
        } else {
            // Declare two dates
            $Date1 = date('Y-m-d', strtotime('monday this week'));
            $Date2 = date('Y-m-d', strtotime('sunday this week'));

            // Declare an empty array
            $array = array();

            // Use strtotime function
            $Variable1 = strtotime($Date1);
            $Variable2 = strtotime($Date2);

            // Use for loop to store dates into array
            // 86400 sec = 24 hrs = 60*60*24 = 1 day
            for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) {
                $Store = date('Y-m-d', $currentDate);
                $array[] = $Store;
            }

            $week = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            $label = array_combine($array, $week);

            $laporan = DB::table('laporan')
                ->select('nik', 'langkah', 'created_at', DB::RAW('date(created_at) As date_ymd'))
                ->where('nik', session('auth')->nik)
                ->get();
            $no = 0;

            foreach ($label as $k => $v) {
                $find_k = array_search($k, array_column(json_decode(json_encode($laporan), TRUE), 'date_ymd'));

                if ($find_k !== FALSE) {
                    $no = 0;
                    $label[$k] = ['data' => $laporan[$find_k], 'ada' => $no];
                } else {
                    $label[$k] = ['data' => [], 'ada' => ++$no];
                }
            }

            $grafik = DashboardModel::rekap_langkah_user();
            $bmi = DashboardModel::rekap_bmi_user();
            return view('user.dashboard.tampilan-grafik', compact('grafik', 'bmi', 'laporan'), [
                "title" => "Dashboard",
                'check_bolong' => $label[date('Y-m-d')]
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
