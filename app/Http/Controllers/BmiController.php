<?php

namespace App\Http\Controllers;

use App\DA\BmiModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BmiController extends Controller
{
    //===========================Admin======================//
    public function bmi(){
        $bmi = BmiModel::bmi();
        return view('admin.bmi.index', compact('bmi'), [
            "title" => "BMI"
        ]);
    }

    //===========================USer======================//
    public function user_bmi(){
        $bmi = BmiModel::bmi_user();
        return view('user.bmi.index', compact('bmi'), [
            "title" => "BMI"
        ]);
    }

    public function user_tambah_bmi(){
        return view('user.bmi.tambah-bmi', [
            "title" => "Tambah BMI"
        ]);
    }

    public function simpan_bmi(Request $req)
    {
        $nik = $req->input('nik');
        $bb = $req->input('bb');
        $tb = $req->input('tb');
        $tbhasil = $tb/100;
        $hasil = $bb / ($tbhasil * $tbhasil);
        // dd($nik, $bb, $tb, $tbhasil, $hasil);
    if ($hasil <= 17) {
        $keterangan = 'Sangat Kurus';
    } elseif ($hasil >= 17 and $hasil <= 18.5) {
        $keterangan = 'Kurus';
    } elseif ($hasil >= 18.5 and $hasil <= 25) {
        $keterangan = 'Normal';
    } elseif ($hasil >= 25 and $hasil <= 27) {
        $keterangan = 'Gemuk';
    } elseif ($hasil >= 27) {
        $keterangan = 'Obesitas';
    }
    
        $hasilakhir = [
            'nik' => $nik,
            'berat_badan' => $bb,
            'tinggi_badan' => $tb,
            'hasil_bmi' => $hasil,
            'keterangan' => $keterangan
        ];

        BmiModel::simpan_bmi($hasilakhir);
        return redirect('/user/bmi');
    }

    public function detail_bmi($id_bmi){
        $bmi = BmiModel::detail_bmi($id_bmi);
        return view('user.bmi.detail-bmi', compact('bmi'), [
            "title" => "Detail"
        ]);
    }

    public function hapus_bmi($id_bmi)
    {
        DB::table('bmi')->where('id_bmi', $id_bmi)->delete();
        return redirect('/user/bmi');
    }
}
