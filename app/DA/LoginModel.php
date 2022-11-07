<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    public static function getUser($nik){
        return DB::table('users as u')
            ->leftJoin('level as lv', 'u.id_level', '=', 'lv.id_level')
            ->where('u.nik', $nik)
            ->select('u.nik', 'u.nama', 'u.password', 'u.token', 'lv.level_name')
            ->first();
    }
}