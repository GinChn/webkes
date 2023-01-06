<?php

namespace App\Http\Controllers;

use App\DA\BmiModel;
use App\Exports\BmiExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BmiController extends Controller
{
    //===========================Admin======================//
    public function bmi(){
        $bmi = BmiModel::bmi();
        return view('admin.bmi.index', compact('bmi'), [
            "title" => "BMI"
        ]);
    }

    
	public function admin_detail_bmi($id_bmi)
	{
		$bmi = BmiModel::detail_bmi($id_bmi);
        return view('admin.bmi.detail-bmi', compact('bmi'), [
            "title" => "Detail"
        ]);
	}

    public function hapus_bmi($id_bmi)
    {
        DB::table('bmi')->where('id_bmi', $id_bmi)->delete();
        return redirect('/admin/bmi');
    }

    public function export_bmi()
    {
        return Excel::download(new BmiExport, 'Data BMI Karyawan.xlsx');
    }

    //===========================USer======================//
    public function user_bmi(){
        $bmi = BmiModel::bmi_user();
        $data = BmiModel::tambah_bmi(session('auth')->nik);
        return view('user.bmi.index', compact('bmi', 'data'), [
            "title" => "BMI"
        ]);
    }

    public function simpan_bmi(Request $req)
    {
        $nik = $req->input('nik');
        $cekdata = BmiModel::validuser($nik);
        $jk = $req->input('jk');
        $usia = $req->input('usia');
        $bb = $req->input('bb');
        $tb = $req->input('tb');
        $tbhasil = $tb/100;
        $hasil_bmi = $bb / ($tbhasil * $tbhasil);
        $bmr_wanita = 655 + (9.6 * $bb) + (1.8 * $tb) - (4.7 * $usia);
        $bmr_pria = 66 + (13.7 * $bb) + (5 * $tb) - (6.8 * $usia);
        $ideal_pr = ($tb - 100) - ((($tb - 100) * 15) / 100);
        $ideal_lk = ($tb - 100) - ((($tb - 100) * 10) / 100);

        // dd($nik, $bb, $tb, $tbhasil, $hasil);
    // =============== Perhitungan BMI ====================== //
    if ($hasil_bmi <= 17) {
        $keterangan = 'Sangat Kurus';
    } elseif ($hasil_bmi >= 17 and $hasil_bmi <= 18.5) {
        $keterangan = 'Kurus';
    } elseif ($hasil_bmi >= 18.5 and $hasil_bmi <= 25) {
        $keterangan = 'Normal';
    } elseif ($hasil_bmi >= 25 and $hasil_bmi <= 27) {
        $keterangan = 'Gemuk';
    } elseif ($hasil_bmi >= 27) {
        $keterangan = 'Obesitas';
    } 

    // =============== Perhitungan BMR ====================== //
    if ($jk == 'Perempuan') {
        $ideal = $ideal_pr;
        $hasil_bmr = $bmr_wanita;
    } elseif ($jk == 'Laki-laki') {
        $ideal = $ideal_lk;
        $hasil_bmr = $bmr_pria;
    }

    // =============== Simpan Semua Perhitungan Ke dalam Array ====================== //
        $hasilakhir = [
            'nik' => $nik,
            'jenis_kelamin' => $jk,
            'usia' => $usia,
            'berat_badan' => $bb,
            'tinggi_badan' => $tb,
            'hasil_bmi' => $hasil_bmi,
            'keterangan' => $keterangan,
            'ideal' => $ideal,
            'hasil_bmr' => $hasil_bmr,
        ];

        // =============== Kirim data ke model ====================== //
        if($cekdata){
            return back()->with('gagal', 'Maaf, Anda Hanya Bisa Input Sekali Dalam Sehari. Coba Lagi Besok');
        }
        
        BmiModel::simpan_bmi($hasilakhir);
        return redirect('/user/bmi')->with('sukses', 'Data Berhasil Tersimpan');
    }

    public function detail_bmi($id_bmi){
        $bmi = BmiModel::detail_bmi($id_bmi);
        return view('user.bmi.detail-bmi', compact('bmi'), [
            "title" => "Detail"
        ]);
    }
}
