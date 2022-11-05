<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

date_default_timezone_set("Asia/Makassar");
class AdminModel extends Model
{   
    public static function simpan_user($req){
        $token = md5($req->input('nik') . microtime());
        
        DB::table('users')->insert([
            'nik' => $req->input('nik'),
            'nama' => $req->input('nama'),
            'password' => md5($req->input('password')),
            'id_level' => $req->input('level'),
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
