<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

date_default_timezone_set("Asia/Makassar");
class ProfileModel extends Model
{   
    public static function detail_profile($nik){
        return DB::table('users')
            ->where('nik', $nik)
            ->select('nik', 'nama', 'jenis_kelamin', 'tgl_lahir', 'usia')
            ->first();
    }

    public static function edit_profile($nik){
        return DB::table('users')
            ->where('nik', $nik)
            ->select('nik', 'nama', 'jenis_kelamin', 'tgl_lahir', 'usia')
            ->first();
    }

    public static function simpan_profile($req)
    {
        DB::table('users')->where('nik', session('auth')->nik)->update([
            'nik' => $req->nik,
            'nama' => $req->nama,
            'jenis_kelamin' => $req->jk,
            'tgl_lahir' => $req->tl,
            'usia' => $req->usia
        ]);
    }
}
