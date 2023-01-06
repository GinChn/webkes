<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

date_default_timezone_set("Asia/Makassar");
class RegistrasiModel extends Model
{   
    public static function simpan_user($req){
        $tgl_lahir = $req->input('tl');
        $usia = Carbon::parse($tgl_lahir)->age;

        $token = md5($req->input('nik') . microtime());
        
        DB::table('users')->insert([
            'nik' => $req->input('nik'),
            'nama' => $req->input('nama'),
            'jenis_kelamin' => $req->input('jk'),
            'tgl_lahir' => $tgl_lahir,
            'usia' => $usia,
            'password' => md5($req->input('password')),
            'id_level' => $req->input('level'),
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
