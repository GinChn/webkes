<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


date_default_timezone_set("Asia/Makassar");

class DashboardModel extends Model
{
    public static function rekap_langkah($nik = null)
    {
        // $start = date('d', strtotime('monday this week'));
        // $end = date('d', strtotime('sunday this week'));
        // // dd($start, $end);
        // for ($a = $start; $a <= $end; $a++) {
        //     $key[] = $a;
        // }

        // dd($label);

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

        if ($nik) {
            $niknya = $nik;
        } else {
            $niknya = session('auth')->nik;
        }

        $laporan = DB::table('laporan')
            ->join('users', 'laporan.nik', '=', 'users.nik')
            ->select('laporan.id_laporan', 'laporan.nik', 'users.nama', 'laporan.langkah', 'laporan.created_at', DB::RAW('DATE(laporan.created_at) As tgl_split'))
            ->Where('laporan.nik', $nik)
            ->get();

        $new_date = [];

        foreach ($label as $k => $v) {
            $new_date[$k]['hari'] = $v;
            $new_date[$k]['date'] = $k;
            $new_date[$k]['langkah'] = 0;
        }

        foreach ($laporan as $k => $v) {
            if (isset($new_date[$v->tgl_split])) {
                $new_date[$v->tgl_split]['langkah'] = $v->langkah;
            }
        }

        return $new_date;
    }

    public static function rekap_bmi($nik = null)
    {
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

        if ($nik) {
            $niknya = $nik;
        } else {
            $niknya = session('auth')->nik;
        }

        $bmi = DB::table('bmi')
            ->join('users', 'bmi.nik', '=', 'users.nik')
            ->select('bmi.id_bmi', 'bmi.nik', 'users.nama', 'bmi.berat_badan', 'bmi.tinggi_badan', 'bmi.created_at', DB::RAW('DATE(bmi.created_at) As tgl_split'))
            ->Where('bmi.nik', $nik)
            ->get();

        $new_date = [];

        foreach ($label as $k => $v) {
            $new_date[$k]['hari'] = $v;
            $new_date[$k]['date'] = $k;
            $new_date[$k]['berat_badan'] = 0;
            $new_date[$k]['tinggi_badan'] = 0;
        }

        foreach ($bmi as $k => $v) {
            if (isset($new_date[$v->tgl_split])) {
                $new_date[$v->tgl_split]['berat_badan'] = $v->berat_badan;
                $new_date[$v->tgl_split]['tinggi_badan'] = $v->tinggi_badan;
            }
        }

        return $new_date;
    }

    // <!-- USER -->
    public static function rekap_langkah_user()
    {
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
            ->join('users', 'laporan.nik', '=', 'users.nik')
            ->select('laporan.id_laporan', 'laporan.nik', 'users.nama', 'laporan.langkah', 'laporan.created_at', DB::RAW('DATE(laporan.created_at) As tgl_split'))
            ->Where('laporan.nik', session('auth')->nik)
            ->get();

        $new_date = [];

        foreach ($label as $k => $v) {
            $new_date[$k]['hari'] = $v;
            $new_date[$k]['date'] = $k;
            $new_date[$k]['langkah'] = 0;
        }

        foreach ($laporan as $k => $v) {
            if (isset($new_date[$v->tgl_split])) {
                $new_date[$v->tgl_split]['langkah'] = $v->langkah;
            }
        }

        return $new_date;
    }

    public static function rekap_bmi_user()
    {
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

        $bmi = DB::table('bmi')
            ->join('users', 'bmi.nik', '=', 'users.nik')
            ->select('bmi.id_bmi', 'bmi.nik', 'users.nama', 'bmi.berat_badan', 'bmi.tinggi_badan', 'bmi.created_at', DB::RAW('DATE(bmi.created_at) As tgl_split'))
            ->Where('bmi.nik', session('auth')->nik)
            ->get();

        $new_date = [];

        foreach ($label as $k => $v) {
            $new_date[$k]['hari'] = $v;
            $new_date[$k]['date'] = $k;
            $new_date[$k]['berat_badan'] = 0;
            $new_date[$k]['tinggi_badan'] = 0;
        }

        foreach ($bmi as $k => $v) {
            if (isset($new_date[$v->tgl_split])) {
                $new_date[$v->tgl_split]['berat_badan'] = $v->berat_badan;
                $new_date[$v->tgl_split]['tinggi_badan'] = $v->tinggi_badan;
            }
        }

        return $new_date;
    }
}
