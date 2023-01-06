<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

date_default_timezone_set("Asia/Makassar");
class BmiModel extends Model
{   
    public static function bmi(){
        return DB::table('bmi')
        ->join('users', 'bmi.nik', '=', 'users.nik')
        ->select('bmi.id_bmi', 'bmi.nik', 'users.nama', 'bmi.berat_badan', 'bmi.tinggi_badan', 'bmi.keterangan', 'bmi.created_at', 'bmi.ideal')
        ->get();
    }

    public static function bmi_user(){
        return DB::table('bmi')
        ->join('users', 'bmi.nik', '=', 'users.nik')
        ->select('bmi.id_bmi', 'bmi.berat_badan', 'bmi.tinggi_badan', 'bmi.hasil_bmi','bmi.keterangan', 'bmi.created_at')
        ->where('bmi.nik', session('auth')->nik)
        ->get();
    }

    public static function tambah_bmi($nik){
        return DB::table('users')
            ->where('nik', $nik)
            ->select('nik', 'jenis_kelamin', 'usia')
            ->first();
    }

    public static function simpan_bmi($hasilakhir){        
        return DB::table('bmi')->insert($hasilakhir);
    }

    public static function validuser($nik){        
        return DB::table('bmi')->where([
            ['nik', $nik],
            [DB::raw('date(created_at)'),  date('Y-m-d')]
        ])->first();
    }

    public static function detail_bmi($id_bmi){
        return DB::table('bmi')
        ->join('users', 'bmi.nik', '=', 'users.nik')
        ->select('users.nama', 'bmi.berat_badan', 'bmi.tinggi_badan', 'bmi.hasil_bmr', 'bmi.hasil_bmi','bmi.keterangan', 'bmi.ideal', 'bmi.created_at')
        ->where('id_bmi', $id_bmi)
        ->get();
    }
}
