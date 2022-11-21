<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\DA\RegistrasiModel;

class RegistrasiController extends Controller
{
    public function registrasi()
    {
        $user = DB::table('users')
            ->join('level', 'users.id_level', '=', 'level.id_level')
            ->select('users.nik', 'users.nama', 'level.level_name')
            ->get();
        return view('admin.registrasi.index', compact('user'));
    }

    public function tambah_user()
    {
        $level = DB::table('level')->get();
		return view('admin.registrasi.tambah-user', compact('level'));
	}

    public function simpan_user(request $req)
    {
        // dd($req->all());
        $nik = $req->input('nik');

        $check = DB::table('users')->where('nik', $nik)->first();
        if ($check) {
            return redirect('/tambah-user');
        }

        RegistrasiModel::simpan_user($req);

        return redirect('/registrasi');
	}

    public function hapus_user($nik){
        $data = RegistrasiModel::find($id);
        $data->delete();
        return redirect('/registrasi');
    }
}
