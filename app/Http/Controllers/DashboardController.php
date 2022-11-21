<?php

namespace App\Http\Controllers;

use App\DA\UserModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        $admins = User::where('id_level','1')->count();
        $users = User::where('id_level','2')->count();
        return view('admin.dashboard.index', compact('admins', 'users'), [
            "title" => "Dashboard"
        ]);
    }
}
