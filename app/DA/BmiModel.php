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
        ->select('users.nama', 'bmi.created_at', 'bmi.usia', 'bmi.berat_badan', 'bmi.tinggi_badan', 'bmi.keterangan')
        ->get();
    }
}
