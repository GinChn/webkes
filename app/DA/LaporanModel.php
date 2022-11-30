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
            ->select('users.nik', 'users.nama', 'laporan.langkah', 'laporan.id_laporan', 'laporan.created_at',)
            ->get();
    }

    public static function detail_laporan($id_laporan)
    {
        return DB::table('laporan')
            ->join('users', 'laporan.nik', '=', 'users.nik')
            ->select('users.nik', 'users.nama', 'laporan.langkah', 'laporan.id_laporan', 'laporan.created_at', 'laporan.bukti_langkah', 'laporan.selfie_sebelum', 'laporan.selfie_sesudah')
            ->where('id_laporan', $id_laporan)
            ->get();
    }


    // ----------------------------------------USER-------------------------------//
    public static function user_laporan()
    {
        return DB::table('laporan')
            ->join('users', 'laporan.nik', '=', 'users.nik')
            ->select('users.nik', 'users.nama', 'laporan.langkah', 'laporan.id_laporan', 'laporan.created_at', 'laporan.bukti_langkah', 'laporan.selfie_sebelum', 'laporan.selfie_sesudah')
            ->where('laporan.nik', session('auth')->nik)
            ->get();
    }



    // public static function user_inputlaporan($req)
    // {

    //     $laporan = DB::table('laporan')->insert([
    //         'nik' => session('auth')->nik,
    //         'langkah' => $req->input('jumlah_langkah'),
    //         'created_at' => new \DateTime(),
    //     ]);
    // }

    public static function simpanlaporan($req)
    {
        $file_bukti = $req->file('photo_bukti');
        $tanggal_bukti = new \DateTime();
        $tanggal_bukti = $tanggal_bukti->format('d F Y');
        $name_bukti = session('auth')->nik . $tanggal_bukti . '.' . $file_bukti->getClientOriginalExtension();
        $req->file('photo_bukti')->move(public_path('/foto/bukti'), $name_bukti);

        $file_sebelum = $req->file('photo_sebelum');
        $tanggal_sebelum = new \DateTime();
        $tanggal_sebelum = $tanggal_sebelum->format('d F Y');
        $name_sebelum = session('auth')->nik . $tanggal_sebelum . '.' . $file_sebelum->getClientOriginalExtension();
        $req->file('photo_sebelum')->move(public_path('/foto/sebelum'), $name_sebelum);

        $file_sesudah = $req->file('photo_sesudah');
        $tanggal_sesudah = new \DateTime();
        $tanggal_sesudah = $tanggal_sesudah->format('d F Y');
        $name_sesudah = session('auth')->nik . $tanggal_sesudah . '.' . $file_sesudah->getClientOriginalExtension();
        $req->file('photo_sesudah')->move(public_path('/foto/sesudah'), $name_sesudah);

        DB::table('laporan')->insert([
            'nik' => session('auth')->nik,
            'langkah' => $req->input('jumlah_langkah'),
            'created_at' => new \DateTime(),
            'bukti_langkah' => $name_bukti,
            'selfie_sebelum' => $name_sebelum,
            'selfie_sesudah' => $name_sesudah,
        ]);
    }
}
