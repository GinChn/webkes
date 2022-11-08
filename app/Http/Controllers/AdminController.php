<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\DA\AdminModel;

class AdminController extends Controller
{
    //=====================dashboard==========================//
    public function dashboard(){
        return view('admin.dashboard.index');
    }
    //========================================================//
    
    //======================Profile============================//
    public function profile(){
        return view('admin.profile.index');
    }

    public function edit_profile(){
        return view('admin.profile.edit-profile');
    }
    //========================================================//

    //======================karyawan==========================//
    public function karyawan(){
        return view('admin.karyawan.index');
    }
    //========================================================//

    //======================laporan===========================//
    public function laporan(){
        return view('admin.laporan.index');
    }
    //========================================================//

        //======================BMI===========================//
        public function bmi(){
            return view('admin.bmi.index');
        }
        //========================================================//

    //=====================registrasi=========================//
    public function registrasi(){
        $user = DB::table('users')->get();
        return view('admin.registrasi.index', compact('user'));
    }

	public function tambah_user()
	{
        $level = DB::table('level')->get();
		return view('admin.registrasi.tambah-user', compact('level'));
	}

    public function simpan_user(request $req){
        // dd($req->all());
		$nik = $req->input('nik');

        $check = DB::table('users')->where('nik', $nik)->first();
        if ($check)
        {
            return redirect('/tambah-user');
        }

        AdminModel::simpan_user($req);

        return redirect('/registrasi');
	}
    //========================================================//
}
