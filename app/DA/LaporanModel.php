<?php

namespace App\DA;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


date_default_timezone_set("Asia/Makassar");

class LaporanModel extends Model
{
    public static function admin_laporan()
    {
        return DB::table('laporan')
            ->join('users', 'laporan.nik', '=', 'users.nik')
            ->select('users.nik', 'users.nama', 'laporan.langkah', 'laporan.id_laporan', 'laporan.created_at')
            ->get();
    }

    public static function detail_laporan($id_laporan)
    {
        return DB::table('laporan')
            ->join('users', 'laporan.nik', '=', 'users.nik')
            ->select('users.nik', 'users.nama', 'laporan.langkah', 'laporan.id_laporan', 'laporan.created_at', 'laporan.bukti_langkah')
            ->where('id_laporan', $id_laporan)
            ->get();
    }


    // ----------------------------------------USER-------------------------------//
    public static function user_laporan()
    {
        return DB::table('laporan')
            ->join('users', 'laporan.nik', '=', 'users.nik')
            ->select('users.nik', 'users.nama', 'laporan.langkah', 'laporan.id_laporan', 'laporan.created_at', 'laporan.bukti_langkah')
            ->where('laporan.nik', session('auth')->nik)
            ->get();
    }

    public static function simpanlaporan($req)
    {
        $file_bukti = $req->file('photo_bukti');
        $tanggal_bukti = new \DateTime();
        $tanggal_bukti = $tanggal_bukti->format('d F Y');
        $name_bukti = session('auth')->nik . $tanggal_bukti . '.' . $file_bukti->getClientOriginalExtension();
        $req->file('photo_bukti')->move(public_path('/foto/bukti'), $name_bukti);


        DB::table('laporan')->insert([
            'nik' => session('auth')->nik,
            'langkah' => $req->input('jumlah_langkah'),
            'created_at' => new \DateTime(),
            'bukti_langkah' => $name_bukti,
        ]);
    }

    public static function detail_laporanuser($id_laporan)
    {
        return DB::table('laporan')
            ->join('users', 'laporan.nik', '=', 'users.nik')
            ->select('users.nik', 'users.nama', 'laporan.langkah', 'laporan.id_laporan', 'laporan.created_at', 'laporan.bukti_langkah')
            ->where('id_laporan', $id_laporan)
            ->get();
    }

    public static function user_export()
    {
        return DB::table('laporan')
            ->join('users', 'laporan.nik', '=', 'users.nik')
            ->select('users.nik', 'users.nama', 'laporan.langkah', 'laporan.id_laporan', 'laporan.created_at')
            ->where('laporan.nik', session('auth')->nik)
            ->get();
    }
}
