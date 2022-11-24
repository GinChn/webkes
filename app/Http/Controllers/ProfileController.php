<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\DA\ProfileModel;

class ProfileController extends Controller
{
    //===========================Admin======================//
    public function profile(){
        $profile = ProfileModel::detail_profile(session('auth')->nik);
        return view('admin.profile.index', compact('profile'), [
            "title" => "Profile"
        ]);
    }

    public function edit_profile(){
        $profile = ProfileModel::detail_profile(session('auth')->nik);
        return view('admin.profile.edit-profile', compact('profile'), [
            "title" => "Edit Profile"
        ]);
    }

    public function simpan_profile(Request $req)
    {
        ProfileModel::simpan_profile($req);
        return redirect('/admin/profile');
    }

    //===========================User======================//
    public function user_profile(){
        $profile = ProfileModel::detail_profile(session('auth')->nik);
        return view('user.profile.index', compact('profile'), [
            "title" => "Profile"
        ]);
    }

    public function user_edit_profile(){
        $profile = ProfileModel::detail_profile(session('auth')->nik);
        return view('user.profile.edit-profile', compact('profile'), [
            "title" => "Edit Profile"
        ]);
    }

    public function user_simpan_profile(Request $req)
    {
        ProfileModel::simpan_profile($req);
        return redirect('/user/profile');
    }
}
